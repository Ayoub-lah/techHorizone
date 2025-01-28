document.querySelector('.file-input-wrapper input[type=file]').addEventListener('change', function(){
    if( this.files && this.files.length > 0 ){
        document.querySelector('.btn-file').textContent = this.files[0].name;
    } else {
        document.querySelector('.btn-file').textContent = 'Choisir une image';
    }
});