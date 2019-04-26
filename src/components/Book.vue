<template>
    <div class="book_page" :class="beiJing">
        <div class="book" v-loading.fullscreen.lock="fullscreenLoading">
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
                            <li v-for="value in booklist" :key="value.id">
                                <a @click="tiao(value.id)">{{ value.title }}</a>
                            </li>
                    </ul>
                </div>
            </transition>
            <div class='popContainer' v-show="showMuLu" @click="showMuLu = !showMuLu"></div>

            <transition name="el-zoom-in-bottom">
                <div v-show="showSheZhi" class="jindu shezhi">
                    <el-row class="z1000">
                        <el-col :span="2"><el-button type="text" @click="gaiZiHao(-1)">A-</el-button></el-col>
                        <el-col :span="20">
                            <div class="block z1000">
                                <el-slider v-model="ziti" @change="gaiZiHao" :max="10" :min="1"></el-slider>
                            </div>
                        </el-col>
                        <el-col :span="2" class="textRight"><el-button type="text" @click="gaiZiHao(1)">A+</el-button></el-col>
                    </el-row>
                    <div style="margin-top: 20px" class="z1000">
                        <el-radio-group v-model="beiJingSe" @click="gaiBeiJing" size="small">
                            <el-radio label="1" border class="bj1">纸色</el-radio>
                            <el-radio label="2" border class="bj2">浅蓝</el-radio>
                            <el-radio label="3" border class="bj3">浅绿</el-radio>
                            <el-radio label="4" border class="bj4">白色</el-radio>
                        </el-radio-group>
                    </div>

                    <el-row class="z1000 textCenter">
                        <el-col :span="12"></el-col>
                        <el-col :span="12"></el-col>
                    </el-row>
                </div>
            </transition>
            <div class='popContainer1' v-show="showSheZhi" @click="showSheZhi = !showSheZhi"></div>

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
                    <el-col :span="6">
                        <span @click="showSheZhi = !showSheZhi" class="shezhi_button">
                            <i class="el-icon-setting"></i><br>
                            设置
                        </span>
                    </el-col>
                    <el-col :span="6">
                        <span @click="yejian" class="yejian_button">
                            <i class="el-icon-view"></i><br>
                            夜间
                        </span>
                    </el-col>
                </el-row>
            </transition>
        </div>
        <div class="h1">
            <h1 class="isFixed" id="h1" :class="beiJing">{{ booktitle }}<span>{{ juantitle }}</span></h1>
        </div>
        <el-row v-for="value in book" :key="value.id" :id="forId(value.id)">
            <el-col :span="24" class="booktext" :class="ziHao">
                <section @click="showMenu = !showMenu">
                    <h3  ref="booktitletext">{{ value.title }}</h3>
                    <div v-html="value.body">
                    </div>
                </section>

            </el-col>

        </el-row>
        <el-row>
            <el-col class="textCenter" id="nextpage"><el-button type="primary"  @click="nextPage">加载下一章</el-button></el-col>
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
        top: 0;
        background: #c8e8c8;
        left: 0;
        margin: 0 8px;
        width: 100%;
        margin: 0;
        padding: 5px 0;
        color: #7f7f7f;
        height: 25px;
        z-index: 99;
        text-indent: 15px;
    }
    .isFixed span{
        right: 15px;
        position: absolute;
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
        padding: 0.5rem 0;

    }
    .jindu .z1000{
        margin: 0 1rem;
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
    div.popContainer1 {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
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
        padding:0 1rem;
    }
    .mulu_ul a{
        height: 2.5rem;
        line-height: 2.5rem;
        display: block;
    }
    .shezhi .el-radio--small{
        margin-right: 5px;
    }
     .bj1{
        background-image: url("../assets/bj.jpg");
    }
    .bj2{
        background-color: #c3d4e6;
    }
    .bj3{
        background-color: #c8e8c8;
    }
    .bj4{
        background-color: #fff;
    }
    .zihao1{
        font-size: 0.8rem;
    }
    .zihao2{
        font-size:0.9rem;
    }
    .zihao3{
        font-size:1rem;
    }
    .zihao4{
        font-size:1.1rem;
    }
    .zihao5{
        font-size:1.2rem;
    }
    .zihao6{
        font-size:1.3rem;
    }
    .zihao7{
        font-size:1.4rem;
    }
    .zihao8{
        font-size: 1.5rem;
    }
    .zihao9{
        font-size: 1.6rem;
    }
    .zihao10{
        font-size:1.7rem;
    }
    .heiye{
        background-color: #000;
        color: #fff;
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
            //字体大小
            ziti: 5,
            show:false,
            dialogVisible: false,
            //显示菜单
            showMenu: false,
            booktitle:'',
            juantitle:'',
            booktitleclass:false,
            //小说章节
            book:[],
            //小说目录
            booklist:[],
            //章节高度
            page:[],
            showJinDu:false,
            //显示小说目录
            showMuLu:false,
            showSheZhi:false,
            beiJingSe: '3',
            beiJing:'bj3',
            ziHao:'1.2rem',
            //黑夜模式
            heiye:false,
            fullscreenLoading: true
        };
    },
    created() {
        this.tiao();

    },
    methods: {
        tiao(id){
            var url='';
            id = id ? id : this.$route.params.zid;
            if(id){
                url = "getBook/" + this.$route.params.id + '/' + id;
            }else{
                url = "getBook/" + this.$route.params.id
            }

            this.$http.get(url).then(result => {
                // 注意： 通过 $http 获取到的数据，都在 result.body 中放着
                console.log(result)
                if (result.status === 200) {
                    // 成功了
                    this.book = result.body.book;
                    this.booktitle = this.book[0]['title'];
                    this.juantitle = this.book[0]['juan'];
                    this.booklist = result.body.booklist;
                    this.showMuLu = false;
                    this.showMenu = false;
                    window.scrollTo(0,0);
                    this.closeFullScreen();
                    //console.log(this.book)
                } else {
                    // 失败了
                    alert("获取数据失败！");
                }
            });
        },
        closeFullScreen() {
            this.fullscreenLoading = false;
            setTimeout(() => {
                this.fullscreenLoading = false;
            }, 2000);
        },
        forId:function (index){
            return 'bookheight' + index;
        },
        yejian(){
            if(this.heiye){
                this.heiye = false;
                this.beiJing = ''
            }else{
                this.beiJing = 'heiye'
                this.heiye = true;
            }
        },
        gaiBeiJing(){
            switch(this.beiJingSe)
            {
                case '1':
                    this.beiJing = 'bj1'
                    break;
                case '2':
                    this.beiJing = 'bj2'
                    break;
                case '3':
                    this.beiJing = 'bj3'
                    break;
                case '4':
                    this.beiJing = 'bj4'
                    break;
                default:
                    this.beiJing = ''
            }
        },
        gaiZiHao(n){
            if(n < 0){
                this.ziti = this.ziti - 1
            }else{
                this.ziti = this.ziti + 1
            }
            switch(this.ziti)
            {
                case 1:
                    this.ziHao = 'zihao1'
                    break;
                case 2:
                    this.ziHao = 'zihao2'
                    break;
                case 3:
                    this.ziHao = 'zihao3'
                    break;
                case 4:
                    this.ziHao = 'zihao4'
                    break;
                case 5:
                    this.ziHao = 'zihao5'
                    break;
                case 6:
                    this.ziHao = 'zihao6'
                    break;
                case 7:
                    this.ziHao = 'zihao7'
                    break;
                case 8:
                    this.ziHao = 'zihao8'
                    break;
                case 9:
                    this.ziHao = 'zihao9'
                    break;
                case 10:
                    this.ziHao = 'zihao10'
                    break;
                default:
                    this.ziHao = ''
            }
        },
        //滚动事件
        handleScroll () {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
            let offsetTop = document.querySelector('.booktext').offsetTop
//            scrollTop > offsetTop ? this.booktitle = true : this.booktitle = false

            console.log(document.querySelector('.mulu_ul'))
            this.$nextTick(function(){

                //屏幕高度
                var h = window.screen.height;
                var h1 = document.getElementById("h1").clientHeight;
                var h2 = document.getElementById("nextpage").clientHeight;

                //显示相应每章标题
                var n = this.page.length;
                for (var i= 0;i<n;i++){
                    if(this.page[i] > scrollTop){
                        this.booktitle = this.book[i]['title']
                        this.juantitle = this.book[i]['juan']
                        break
                    }
                }

                //判断是否到底部
                if(this.page[n-1] - scrollTop <= h-h1-h2 && typeof(this.page[n-1]) != "undefined"){
                    //加载下一章
                    this.showPage('next',this.book[n-1]['id'])

                }
                //判断是否到顶部
                if(scrollTop == 0){
                    //加载上一章
                    if(this.book[0]['id']>1){
                        this.showPage('previous',this.book[0]['id'])
                        //console.log(this.page[0])

                    }else{
                        alert("没有了，这是第一章");
                    }
                }
            });



        },
        handleClose(done) {
            done();
        },
        tui(){
            window.history.length > 1
                    ? this.$router.go(-1)
                    : this.$router.push('/')
        },
        nextPage(){
            var n = this.page.length;
            this.showPage('next',this.book[n-1]['id'])
        },
        showPage(type,id){
            //this.fullscreenLoading = true;
            //console.log(this.$route.params.id)
            this.$http.post("getBook",{
                sid:this.$route.params.id,
                zid:id,
                type:type
            }).then(result => {
                // 注意： 通过 $http 获取到的数据，都在 result.body 中放着
                console.log(result)
                if (result.status === 200) {
                    // 成功了
                    if(type == 'previous'){
                        this.book.unshift(result.body);
                        //this.closeFullScreen();
                        this.booktitle = this.book[0]['title'];
                        this.juantitle = this.book[0]['juan'];
                        var w = window.screen.height;
                        this.$nextTick(function(){
                            var o = document.getElementById("bookheight"+this.book[0]['id']);
                            var h = o.clientHeight||o.offsetHeight;
                            window.scrollTo(0,h-w/2)
                        });
                        result = '';
                    }
                    if(type == 'next'){
                        this.book.push(result.body);
                        //this.closeFullScreen();
                        this.booktitle = this.book[0]['title'];
                        this.juantitle = this.book[0]['juan'];

                        result = '';
                    }
                    //console.log(this.book)
                } else {
                    // 失败了
                    alert("获取数据失败！");
                }
            });
        },
        muluScroll(){
            console.log(document.querySelector('.booktext').offsetTop)
        }
    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll)
        document.querySelector('.mulu').addEventListener('scroll', this.muluScroll)
        //console.log(window)
    },
    updated(){

        for(var i in this.book){
            var o = document.getElementById("bookheight"+this.book[i]['id']);
            if(o){
                var h = o.clientHeight||o.offsetHeight;
                this.page[i] = h;
            }
        }
        for(var i = 1;i < this.page.length; i++){
            this.page[i] = this.page[i-1] + this.page[i];
        }


    }
    };
</script>
