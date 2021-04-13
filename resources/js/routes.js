import Dashboard from './pages/Dashboard';
import Users from './pages/Users';
import Posts from './pages/Posts';
import Albums from './pages/Albums';
import Photos from './pages/Photos';
import Comments from './pages/Comments';
import Todos from './pages/Todos';

export default {
    mode: 'history',
    routes: [
        { path:'/', component: Dashboard, },
        { path:'/dashboard', component: Dashboard, },
        { path:'/users', component: Users, },
        { path:'/posts', component: Posts, },
        { path:'/comments', component: Comments, },
        { path:'/albums', component: Albums, },
        { path:'/photos', component: Photos, },
        { path:'/todos', component: Todos, }
    ]
}