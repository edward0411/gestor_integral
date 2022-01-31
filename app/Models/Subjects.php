<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subjects extends Model
{
    use SoftDeletes;
    protected $table = 'subjects';

    protected $fillable = [
        'id_area',
        's_name',
        's_order',
        's_state',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    const HUMAN_SCIENCE = [
        'Archivo',
        'Corrección de Estilo',
        'Estudios Literarios',
        'Filosofía',
        'Historia',
        'Humanidades',
        'Información y Documentación',
        'Lingüística',
        'Redacción de documentos',
        'Teología'
    ];

    const SOCIAL_SCIENCE = [
        'Antropología',
        'Cine / Cinematografía',
        'Comunicación',
        'Comunicación Audiovisual',
        'Geografía',
        'Geografía y Ordenación del Territorio',
        'Periodismo',
        'Psicología',
        'Sociología',
        'Trabajo Social',
    ];

    const ART_AND_DESIGN = [
        'Artes Escénicas',
        'Artes Plásticas',
        'Conservación Restauración de Bienes Culturales',
        'Danza',
        'Diseño',
        'Diseño de Interiores',
        'Diseño de Moda',
        'Diseño de Productos',
        'Diseño Digital y Multimedia',
        'Diseño gráfico',
        'Fotografía',
        'Historia del Arte',
        'Música',
        'Paisajismo',
    ];

    const OTHER_AREAS = [
        'Gastronomía y Artes Culinarias',
        'Hotelería',
        'Turismo',
    ];

    const EXACT_SCIENCES = [
        'Astronomía y Astrofísica',
        'Biología',
        'Bioquímica',
        'Biotecnología',
        'Ciencia e Ingeniería de Datos',
        'Ciencia y Tecnología de los Alimentos',
        'Ciencias Ambientales',
        'Ciencias del Mar',
        'Ciencias Experimentales',
        'Enología',
        'Estadística',
        'Física',
        'Geología',
        'Matemáticas',
        'Nanociencia y Nanotecnología',
        'Química',
    ];

    const ECONOMIC_SCIENCES = [
        'Administración y Dirección de Empresas',
        'Asistencia en Dirección',
        'Ciencias del Trabajo y Recursos Humanos',
        'Ciencias del Transporte y Logística',
        'Ciencias Políticas y de la Administración Pública',
        'Comercio',
        'Contabilidad y Finanzas',
        'Criminología',
        'Economía',
        'Marketing',
        'Marketing',
        'Matemáticas Financiera',
        'Negocios internacionales',
        'Protocolo y Organización de Eventos',
        'Publicidad y Relaciones Públicas',
        'Relaciones Internacionales',
        'Seguridad y Control de Riesgos',
    ];

    const HEALTH_SCIENCES = [
        'Ciencias Biomédicas',
        'Ciencias de la Actividad Física y del Deporte',
        'Enfermería',
        'Genética',
        'Farmacia',
        'Fisioterapia',
        'Logopedia',
        'Medicina',
        'Nutrición Humana y Dietética',
        'Odontología',
        'Óptica y Optometría',
        'Podología',
        'Terapia Ocupacional',
        'Veterinaria',
    ];

    const LEGAL_SCIENCES = [
        'Derecho',
        'Política',
        'Derechos humanos',
    ];

    const ENGINEERING_ARCHITECTURE = [
        'Animación',
        'Arquitectura',
        'Arquitectura Técnica / Ingeniería de la Edificación',
        'Desarrollo de Aplicaciones Web',
        'Diseño y Desarrollo de videojuegos',
        'Grado Abierto en Ingeniería y Arquitectura',
        'Ingeniería Aeroespacial',
        'Ingeniería Agroambiental',
        'Ingeniería Alimentaria',
        'Ingeniería Ambiental',
        'Ingeniería Biomédica',
        'Ingeniería Civil',
        'Ingeniería de Caminos Canales y Puertos',
        'Ingeniería de la Automoción',
        'Ingeniería de la Energía',
        'Ingeniería de las Industrias Agrarias y Alimentarias',
        'Ingeniería de los Materiales',
        'Ingeniería de Minas',
        'Ingeniería de Sistemas Audiovisuales / Sonido e Imagen',
        'Ingeniería de Sistemas Biológicos',
        'Ingeniería de Sistemas',
        'Ingeniería de Tecnología y Diseño Textil',
        'Ingeniería de Telecomunicación(Teleco) y de Sistemas de Comunicación',
        'Ingeniería del Software',
        'Ingeniería Eléctrica y Electrónica',
        'Ingeniería en Diseño Industrial y Desarrollo de Producto',
        'Ingeniería en Informática',
        'Ingeniería en Organización Industrial',
        'Ingeniería en Tecnologías Industriales',
        'Ingeniería Física',
        'Ingeniería Forestal/Ingeniería del Medio Natural',
        'Ingeniería Geológica',
        'Ingeniería Geomática y Topografía',
        'Ingeniería Industrial',
        'Ingeniería Matemática',
        'Ingeniería Mecánica',
        'Ingeniería Mecatrónica',
        'Ingeniería Náutica y Transporte Marítimo',
        'Ingeniería Naval y Oceánica',
        'Ingeniería Química',
        'Ingeniería Robótica',
        'Ingeniería Telemática',
        'Piloto y Dirección de Operaciones Aéreas',
        'Termodinámica',
    ];

    const EDUCATION = [
        'Educación Infantil',
        'Pedagogía',
        'Educación',
    ];

    const LANGUAGE = [
        'Idiomas',
        'Lenguas Modernas -Lenguas Clásicas-Filologías',
        'Traducción e Interpretación',
    ];

    const ACTIVO = 1;

    // relaciones
    public function area() {
        return $this->belongsTo(Areas::class, 'id_area');
    }

    public function topics() {
        return $this->hasMany(Topics::class, 'id_subject');
    }

    // scope
    function scopeHandleText($query, $text){
        return $query->where('s_name', $text);
    }
}
