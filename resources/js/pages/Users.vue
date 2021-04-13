<template>
    <div>
        <div class="row pt-4">
            <div class="col-12">
                <div class="card rounded-xl shadow-md">
                    <div class="card-header">
                        <h3 class="card-title" style="font-weight: bold;">Users</h3>
                    </div>
                    <div class="card-body">
                        
                        <div class="row py-4">
                            <div class="col-12">
                                <input type="text" placeholder="Search..." class="form-control rounded-2xl focus:ring focus:ring-blue-300" v-model="search">
                            </div>
                        </div>

                        <Pagination :data="pages" @pagination-change-page="getUsers"></Pagination>

                        <div class="table-responsive pt-3">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Website</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="user in users" :key="user.id">
                                        <td class="w-1/12">{{ user.id }}</td>
                                        <td class="w-2/12">{{ user.name }}</td>
                                        <td class="w-2/12">{{ user.username }}</td>
                                        <td class="w-2/12">{{ user.email }}</td>
                                        <td class="w-2/12">{{ user.phone }}</td>
                                        <td class="w-3/12">{{ user.website }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <Pagination :data="pages" @pagination-change-page="getUsers"></Pagination>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Pagination from "laravel-vue-pagination";

export default {
    components: {
        Pagination
    },
    data() {
        return {
            users: [],
            pages: {},
            search: '',
        }
    },

    mounted() {
        this.getUsers();
    },
    
    watch: {
        search: function()  {
            this.getUsers();
        }
    },

    methods: {
        getUsers: async function(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get('/api/users', { params: { page: page, search: this.search }}) 
            .then((res) => {
                this.users = res.data.data;
                this.pages = res.data;
                // console.log(this.pages);
                // console.log(this.users);
            })
            .catch((error) => {
                console.log(error);
            });
        },
    }
}
</script>