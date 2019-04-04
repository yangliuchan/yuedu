import VueRouter from 'vue-router'
import AddBlog from './components/addBlog'
import UpdateBlog from './components/updateBlog'
import ListBlog from './components/ListBlog'
import HomeBlog from './components/HomeBlog'
import Search from './components/Search'
import Book from './components/Book'

import SlideComponent from './components/slide.vue'
import SwiperComponent from './components/swiper.vue'



// 1、创建路由对象
var router = new VueRouter({
    routes: [
        { path: '/listBlog', component: ListBlog },
        { path: '/addBlog', component: AddBlog },
        { path: '/updateBlog/:id', component: UpdateBlog },
        { path: '/Search/:keyword', component: Search },
        { path: '/Book/:id', component: Book },
        { path: '/swiper', component: SwiperComponent },
        { path: '/', component: HomeBlog }
    ]
})

// 2、把路由对象暴露出去
export default router