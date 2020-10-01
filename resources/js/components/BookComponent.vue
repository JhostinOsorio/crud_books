<template>
    <div>
        <div class="container my-4">
            <div class="d-flex mb-4">
                <h3>Listado de Libros</h3>
                <button type="button" @click="add" class="btn btn-success ml-auto">Agregar</button>
            </div>
            <div class="card p-4">
                <table-book @updateModal="update" @readdeletebook="readBooks" :data="data"></table-book>
            </div>
        </div>
        <modal-book :header="header" :row="row" :action="action" @readAfterCreated="readBooks"></modal-book>
    </div>
</template>
<script>
export default {
    data () {
        return {
            header : '',
            action : '',
            row : {
                id : 0,
                title : '',
                description : '',
                editorial : '',
                author : '',
                gender : '',
                format : '',
                year_of_publication : '',
            },
            data : [],
        }
    },
    methods : {
        add () {
            this.header = "Registrar Libro";
            this.action = "store";
            this.row = {
                id : 0,
                title : '',
                description : '',
                editorial : '',
                author : '',
                gender : '',
                format : '',
                year_of_publication : '',
            }
            $('#staticBackdrop').modal('show');
        },
        update (row) {
            this.header = "Actualizar Libro";
            this.action = "update";
            this.row = {
                id : row.id,
                title : row.title,
                description : row.description,
                editorial : row.editorial,
                author : row.author,
                gender : row.gender,
                format : row.format,
                year_of_publication : row.year_of_publication,
            }
            $('#staticBackdrop').modal('show');
        },
        readBooks () {
            axios.get('/books')
            .then(data => {
                this.data = [];
                this.data = data.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        }
    },
    created () {
        this.readBooks();
    },
}
</script>
<style>

</style>
