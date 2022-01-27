<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestQuestion extends Model
{
    use SoftDeletes;
    protected $table = 'request_questions';

    protected $fillable = [
        'question',
        'question_type',
        'type_service_id',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    const WORK = [
        'Parámetros o requisitos del trabajo o tarea',
        'Fecha para cuándo lo necesitas?',
    ];

    const EXAM = [
        'Temas que te van a evaluar?',
        'Fecha para cuándo tendrás el examen y hora?',
        'Duración del examen, cuestionario, prueba, test, quiz, control o seguimiento',
    ];

    const THESIS = [
        'El anteproyecto o propuesta de investigación que te haya aprobado la universidad o institución o el tema que deseas investigar',
        'Nombre de la carrera.?',
        'Los lineamientos de la universidad referentes a este tipo de trabajo, como partes o cantidad de hojas.',
        'El cronograma de avances y fecha final de entrega',
    ];

    const MATTER = [
        'Nombre de la materia que requieres?',
        'Fecha de inicio y terminación del curso, o si tienes algún cronograma en específico.',
        'Cantidad de actividades?',
        'Si tienes el link para acceder a la plataforma o si cuentas con el contenido del curso',
    ];

    const LESSONS = [
        'Temas que requieres para la explicación?',
        'Fecha para cuándo requieres la clase o asesoría y hora?',
        'Duración de la clase, cantidad de personas que asistirían',
    ];

    const PROFESSIONAL = [
        'Tipo de servicio profesional',
        'Fecha para cuándo requieres la clase?',
        'Especificaciones del servicio?',
    ];


    const ACTIVO = 1;

    const ABIERTA = 'ABIERTA';
    const CERRADA = 'CERRADA';

    // relaciones
    public function parametric() {
        return $this->belongsTo(Parametrics::class, 'type_service_id');
    }

    public function requestResponses() {
        return $this->hasMany(RequestResponse::class, 'request_question_id');
    }

}
