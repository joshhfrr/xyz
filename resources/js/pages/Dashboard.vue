<template>
    <div id="app">
        <div>
            <div class="row pt-4">
                <div class="col-12">
                    <div class="card rounded-xl shadow-md">
                        <div class="card-header">
                            <h3 class="card-title" style="font-weight: bold;">Dashboard</h3>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center mb-3">

                                <div class="col-12 col-sm-6 col-md-3 px-4">
                                    <router-link to="/users" class="hover:text-blue-600">
                                    <div class="info-box shadow-xl">
                                        <span class="info-box-icon bg-gray-200 elevation-1"><i class="fas fa-user"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">USERS</span>
                                        </div>
                                    </div>
                                    </router-link>
                                </div>

                                <div class="col-12 col-sm-6 col-md-3 px-4">
                                    <router-link to="/posts" class="hover:text-blue-600">
                                    <div class="info-box shadow-xl">
                                        <span class="info-box-icon bg-gray-200 elevation-1"><i class="fas fa-sticky-note"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Posts</span>
                                        </div>
                                    </div>
                                    </router-link>
                                </div>

                                <div class="col-12 col-sm-6 col-md-3 px-4">
                                    <router-link to="/comments" class="hover:text-blue-600">
                                    <div class="info-box shadow-xl">
                                        <span class="info-box-icon bg-gray-200 elevation-1"><i class="fas fa-comments"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Comments</span>
                                        </div>
                                    </div>
                                    </router-link>
                                </div>
                                
                            </div>

                            <div class="row justify-content-center mb-3">
                                <div class="col-12 col-sm-6 col-md-3 px-4">
                                    <router-link to="/photos" class="hover:text-blue-600">
                                    <div class="info-box shadow-xl">
                                        <span class="info-box-icon bg-gray-200 elevation-1"><i class="fas fa-camera"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Photos</span>
                                        </div>
                                    </div>
                                    </router-link>
                                </div>

                                <div class="col-12 col-sm-6 col-md-3 px-4">
                                    <router-link to="/albums" class="hover:text-blue-600">
                                    <div class="info-box shadow-xl">
                                        <span class="info-box-icon bg-gray-200 elevation-1"><i class="fas fa-image"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Albums</span>
                                        </div>
                                    </div>
                                    </router-link>
                                </div>

                                <!-- <div class="col-12 col-sm-6 col-md-3 px-4">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-gray-200 elevation-1"><i class="fas fa-comments"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Comments</span>
                                        </div>
                                    </div>
                                </div> -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>