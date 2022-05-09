const Home = () => import('./components/Home.vue')
const Show = () => import('./components/note/Show.vue')
const Create = () => import('./components/note/Create.vue')
const Edit = () => import('./components/note/Edit.vue')


export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'showNotes',
        path: '/notes',
        component: Show
    },
    {
        name: 'createNote',
        path: '/create',
        component: Create
    },
    {
        name: 'editNote',
        path: '/edit/:id',
        component: Edit
    }
]