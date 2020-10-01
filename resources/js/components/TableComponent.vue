<template>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Editorial</th>
                    <th>Autor</th>
                    <th>Género</th>
                    <th>Formato</th>
                    <th>Publicación</th>
                    <th colspan="2" class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="row in data" :key="row.id">
                    <td>{{row.title}}</td>
                    <td>{{row.description}}</td>
                    <td>{{row.editorial}}</td>
                    <td>{{row.author}}</td>
                    <td>{{row.gender}}</td>
                    <td>{{row.format}}</td>
                    <td>{{row.year_of_publication}}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" @click="update(row)">Editar</button>
                    </td>
                    <td><button type="button" class="btn btn-danger btn-sm" @click="deleteBook(row.id)">Eliminar</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    props : {
        data : {
            default : [],
        },
    },
    data () {
        return {

        }
    },
    methods : {
        readBooks () {
            axios.get('/books')
            .then(data => {
                this.data = [];
                this.data = data.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
        update (row) {
            this.$emit('updateModal', row);
        },
        deleteBook (identificador) {
            swal({
                title: "Deseas eliminar este libro?",
                text: "Una vez eliminado, ¡no podrá recuperar este libro!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.delete('/books/'+identificador)
                        .then(data => {
                            swal("El libro se ha eliminado!", {
                                icon: "success",
                            });
                            this.$emit('readdeletebook');
                        })
                        .catch(error => {
                            swal("Error","El libro no se ha eliminado!");
                        })

                }
            });
        }
    },

}
</script>
<style>

</style>
