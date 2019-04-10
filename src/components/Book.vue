<template>
    <div class="book_page">
        <div class="book">
            <transition name="el-zoom-in-bottom">
                <div v-show="showJinDu" class="jindu">
                    <el-row class="z1000">
                        <el-col :span="8">< 上一章</el-col>
                        <el-col :span="8">1 发的撒的撒</el-col>
                        <el-col :span="8" class="textRight">下一章 ></el-col>
                    </el-row>
                    <div class="block z1000">
                        <el-slider v-model="jindutiao"></el-slider>
                    </div>
                </div>
            </transition>
            <div class='popContainer' v-show="showJinDu" @click="showJinDu = !showJinDu"></div>

            <transition name="el-zoom-in-center">
                <div v-show="showMuLu" class="mulu">
                    <h3 class="textCenter xiDing">目录</h3>
                    <ul class="mulu_ul">
                            <li>第一章 范德萨发的开始</li>
                            <li>第一章 范德萨发的开始</li>
                            <li>第一章 范德萨发的开始</li>
                            <li>第一章 范德萨发的开始</li>
                            <li>第一章 范德萨发的开始</li>
                            <li>第一章 范德萨发的开始</li>
                        </ul>
                </div>
            </transition>
            <div class='popContainer' v-show="showMuLu" @click="showMuLu = !showMuLu"></div>

            <transition name="el-fade-in-linear">
                <div v-show="showMenu" class="book_right">
                    加入书架
                </div>
            </transition>

            <transition name="el-zoom-in-top">
                <div v-show="showMenu" class="book_top">
                    <i @click="tui" class="el-icon-arrow-left f_left"></i>
                    <el-dropdown trigger="click" class="f_right">
                        <span class="el-dropdown-link">
                            <i class="el-icon-more"></i>
                        </span>
                        <el-dropdown-menu slot="dropdown">
                            <el-dropdown-item icon="el-icon-plus">加入书签</el-dropdown-item>
                            <el-dropdown-item icon="el-icon-circle-plus">书籍详情</el-dropdown-item>
                            <el-dropdown-item icon="el-icon-circle-plus-outline">返回我的书架</el-dropdown-item>
                        </el-dropdown-menu>
                    </el-dropdown>
                </div>
            </transition>

            <transition name="el-zoom-in-bottom">
                <el-row v-show="showMenu" class="book_bottom">
                    <el-col :span="6">
                        <span @click="showMuLu = !showMuLu" class="mulu_button">
                            <i class="el-icon-tickets"></i><br>
                            目录
                        </span>
                    </el-col>
                    <el-col :span="6">
                        <span @click="showJinDu = !showJinDu" class="jindu_button">
                            <i class="el-icon-minus"></i><br>
                            进度
                        </span>
                    </el-col>
                    <el-col :span="6"><i class="el-icon-setting"></i>设置</el-col>
                    <el-col :span="6"><i class="el-icon-view"></i>夜间</el-col>
                </el-row>
            </transition>
        </div>
        <div class="h1">
            <h1 class="isFixed">{{ booktitle }}</h1>
        </div>
        <el-row v-for="value in book" :key="value.id">
            <el-col :span="24" class="booktext" ref="bookheight">
                <section @click="showMenu = !showMenu">
                    <h3  ref="booktitletext">{{ value.title }}</h3>
                    <div v-html="value.body">
                    </div>
                </section>

            </el-col>

        </el-row>

    </div>
</template>
<style>

    .book_page{
        position: absolute;
        width: auto;
        height: auto;
        padding: 0 8px;
        top:0;
        left: 0;
        background: #c8e8c8;
    }
    .booktext{
        font-size: 1.2rem;
        line-height: 2rem;
        height: 100%;
    }
    .h1{
        height: 35px;
    }
    .book_page h1{
        font-size: 100%;
        font-weight: normal;
        color:#7f7f7f;
    }
    .isFixed{
        font-size: 100%;
        font-weight: normal;
        display: block;
        position: fixed;
        top:0;
        background: #c8e8c8;
        width: 100%;
        margin: 0;
        padding: 5px 0;
        color:#7f7f7f;
        height:25px;
        z-index:99;
    }
    .book_top,.book_bottom,.book_right {
        background-color: #000;
        color: #fff;
        box-sizing: border-box;
        position: absolute;
    }
    .book{
        top:0;
        left:0;
        width: 100%;
        position: fixed;
        z-index: 2000;
    }
    .book_right{
        top: 3rem;
        right:0;
        padding: 5px 10px;
        border-radius: 5px;
    }
    .book_top{
        height: 2.5rem;
        width: 100%;
        padding: 8px;
        font-size: 1.4rem;
    }
    .book_top .el-dropdown{
        color: #fff;
    }
    .book_bottom{
        position:fixed;
        bottom:0;
        width: 100%;
        text-align: center;
    }
    .mulu_button{
        font-size: 0.8rem;
    }
    .mulu_button .el-icon-tickets{
        font-size: 1.5rem;
    }

    .mulu{
        width: 19rem;
        height: 100%;
        right: 0;
        overflow: hidden;
        display: block;
        z-index: 1000;
        position: fixed;
        background-color:#fff;
        overflow-y:auto;
    }
    .mulu .el-message-box__message a{
        display: block;
        line-height: 2.5rem;
        padding: 0 1rem;
        border-bottom: #ccc solid 1px;
    }

    .jindu{
        width: 100%;
        position: fixed;
        bottom: 3rem;
        left:0;
        background-color: #000;
        color: #fff;
        z-index: 1000;

    }
    .shang_xia{
        position: absolute;
        top:1rem;
        width: 90%;
    }
    div.popContainer {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
        z-index: 99;
    }
    .xiDing{
        position: fixed;
        width: 80%;
        height: 2rem;
        top: 0;
        height: 50px;
        background-color: #fff;
        margin:0;
        line-height: 50px;

    }
    .mulu_ul{
        margin-top: 3rem;
        list-style: none;
    }
    .mulu_ul li{

    }

</style>
<script>

    //    console.log(document.body.clientWidth);
    //    console.log(document.documentElement.clientHeight );
    //    console.log(window.screen.height);

    export default {
        data() {
        return {
            //小说进度
            jindutiao: 50,
            show:false,
            dialogVisible: false,
            showMenu: false,
            booktitle:'',
            booktitleclass:false,
            //小说章节
            book:[],
            //章节高度
            page:[],
            showJinDu:false,
            showMuLu:false

        };
    },
    created() {
        var url='';
        if(this.$route.params.zid){
            url = "getBook/" + this.$route.params.id + '/' + this.$route.params.zid;
        }else{
            url = "getBook/" + this.$route.params.id
        }
        //console.log(this.$route)
        this.$http.get(url).then(result => {
            // 注意： 通过 $http 获取到的数据，都在 result.body 中放着
            //console.log(result)
            if (result.status === 200) {
                // 成功了
                this.book = result.body;
                this.booktitle = this.book[0]['title']
                //console.log(this.book)
            } else {
                // 失败了
                alert("获取数据失败！");
            }
        });
    },
    methods: {
        //滚动事件
        handleScroll () {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
            let offsetTop = document.querySelector('.booktext').offsetTop
//            scrollTop > offsetTop ? this.booktitle = true : this.booktitle = false

            //屏幕高度
            var w = window.screen.height;

            //显示相应每章标题

            var n = this.page.length;
            for (var i= 0;i<n;i++){
                if(this.page[i] > scrollTop){
                    this.booktitle = this.book[i]['title']
                    break
                }
            }

            //判断是否到底部
            if(scrollTop > this.page[n-1] - w){
                //加载下一章
                this.showPage('next',this.book[n-1]['id'])
            }
            //判断是否到顶部
            if(scrollTop == 0){
                //加载上一章
                this.showPage('previous',this.book[0]['id'])
                //console.log(this.page[0])
                window.scrollTo(0,100);

            }

            console.log(scrollTop)
//            console.log(this.page)
        },
        handleClose(done) {
            done();
        },
        tui(){
            window.history.length > 1
                    ? this.$router.go(-1)
                    : this.$router.push('/')
        },
        showPage(type,id){
            this.$http.get("getBook/"  + this.$route.params.id + '/' + id + '?type=' + type).then(result => {
                // 注意： 通过 $http 获取到的数据，都在 result.body 中放着
                //console.log(result)
                if (result.status === 200) {
                    // 成功了
                    if(type == 'previous'){
                        this.book.unshift(result.body);
                    }
                    if(type == 'next'){
                        this.book.push(result.body);
                    }
                    //console.log(this.book)
                } else {
                    // 失败了
                    alert("获取数据失败！");
                }
            });
        }
    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll)
        console.log(window)
    },
    updated(){
        //计算每章高度 存在page[]
        for(var i=0;i<this.book.length;i++){
            this.page[i]=this.$refs.bookheight[i].$el.clientHeight
        }
        for(var i = 1;i < this.page.length; i++){
            this.page[i] = this.page[i-1] + this.page[i];
        }

    }
    };
</script>
