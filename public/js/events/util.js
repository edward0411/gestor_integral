
const processResponse = (div, type, message) => {
    console.log("mensaje "+div);
    $('#'+div).html(
        `<div class="alert alert-${type} alert-block shadow">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>${message}</strong>
        </div>`
    )
}

const handleState = (state) => {
    if (state == 0) {
        state_text ='Pendiente';
    }else if(state == 1){
        state_text ='Aprobado';
    }else{
        state_text ='Rechazado';
    }
    return state_text;
}

const clear = (id) =>  {
    $('#'+id).val("");
}
