<template>
    <div class="modal fade" id="staticBackdrop">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{header}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" @submit.prevent="verifyAction" autocomplete="off">
                    <div class="modal-body p-3">
                        <input type="text" class="form-control" id="id" name="id" hidden v-model="row.id">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title" v-model="row.title" placeholder="Titulo" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="description" name="description" rows="2" v-model="row.description" placeholder="Descripción" required maxlength="255"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="editorial" name="editorial" v-model="row.editorial" placeholder="Editorial" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="author" name="author" v-model="row.author" placeholder="Autor" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="gender" name="gender" v-model="row.gender" placeholder="Género" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="format" name="format" v-model="row.format" placeholder="Formato" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="year_of_publication" name="year_of_publication" v-model="row.year_of_publication" placeholder="Año de publicación" required maxlength="4" minlength="4">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props : [
        'header',
        'action',
        'row',
    ],
    data () {
        return {
            // id : row.id,
            // title : row.title,
            // description : row.description,
            // editorial : row.editorial,
            // author : row.author,
            // gender : row.gender,
            // format : row.format,
            // year_of_publication : row.year_of_publication,
        }
    },
    methods : {
        clearInputs () {
            this.row.id = 0;
            this.row.title = '';
            this.row.description = '';
            this.row.editorial = '';
            this.row.author = '';
            this.row.gender = '';
            this.row.format = '';
            this.row.year_of_publication = '';
        },
        addBook () {
            axios.post('/books', {
                title : this.row.title,
                description : this.row.description,
                editorial : this.row.editorial,
                author : this.row.author,
                gender : this.row.gender,
                format : this.row.format,
                year_of_publication : this.row.year_of_publication,
            })
                .then(data => {
                    swal("El libro se ha registrado correctamente!", {
                        icon: "success",
                    });
                    this.clearInputs();
                    this.$emit('readAfterCreated');
                    $("#staticBackdrop").modal("hide");
                })
                .catch(error => {
                    swal("Error","El libro no se ha registrado!",'danger');
                });
        },
        updateBook () {
            axios.put('/books/' + this.row.id, {
                title : this.row.title,
                description : this.row.description,
                editorial : this.row.editorial,
                author : this.row.author,
                gender : this.row.gender,
                format : this.row.format,
                year_of_publication : this.row.year_of_publication,
            })
                .then(data => {
                    swal("El libro se ha actualizado correctamente!", {
                        icon: "success",
                    });
                    this.clearInputs();
                    this.$emit('readAfterCreated');
                    $("#staticBackdrop").modal("hide");
                })
                .catch(error => console.log(error))
        },
        verifyAction () {
            if(this.action == "store"){
                this.addBook();
            }else if(this.action == "update"){
                this.updateBook();
            }
        }
    }
}
</script>
<style>

</style>
