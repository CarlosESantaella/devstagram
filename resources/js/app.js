// import './bootstrap';
import Dropzone from "dropzone";
import.meta.glob([
    './img/**'
]);

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,
    init: function(){
        if(document.form_ps.imagen.value.trim()){
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.form_ps.imagen.value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

dropzone.on('sending', function(file, xhr, formData){
    console.log(formData);
});

dropzone.on('success', function(file, response){
    document.form_ps.imagen.value= response.imagen;
    

});

dropzone.on('error', function(file, message){
    console.log(message);
})

dropzone.on('removedfile', function(file){
    document.form_ps.imagen.value= '';
    
})