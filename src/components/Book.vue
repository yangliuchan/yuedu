<template>
    <div class="book_page">
        <div class="book">
            <transition name="el-fade-in-linear">
                <div v-show="show2" class="book_right">
                    加入书架
                </div>
            </transition>

            <transition name="el-zoom-in-top">
                <div v-show="show2" class="book_top">
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
                <div v-show="show2" class="book_bottom">.el-zoom-in-bottom</div>
            </transition>
        </div>
        <div class="h1">
            <h1 class="isFixed">{{ booktitle }}</h1>
        </div>
        <el-row v-for="value in book">
            <el-col :span="24" class="booktext" ref="bookheight">
                <section @click="show2 = !show2">
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
    }



</style>
<script>


    //    console.log(document.body.clientWidth);
    //    console.log(document.documentElement.clientHeight );
    //    console.log(window.screen.height);

    export default {
        data() {
        return {
            show:false,
            dialogVisible: false,
            show2: false,
            booktitle:false,
            booktitleclass:false,
            book:[],
            page:[]

        };
    },
    created() {
        this.$http.get("getBlogById/" + this.$route.params.id).then(result => {
            // 注意： 通过 $http 获取到的数据，都在 result.body 中放着
            //console.log(result)
            if (result.status === 200) {
                // 成功了
                this.book = result.body;
                //console.log(this.book)
            } else {
                // 失败了
                alert("获取数据失败！");
            }
        });
    },
    methods: {

        handleScroll () {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
            let offsetTop = document.querySelector('.booktext').offsetTop
            scrollTop > offsetTop ? this.booktitle = true : this.booktitle = false
            //console.log(scrollTop)
            //console.log(this.$refs.booktitletext)
            for (var i= 0;i<this.page.length;i++){
                if(this.page[i] > scrollTop){
                    this.booktitle = this.$refs.booktitletext[i].textContent
                    break
                }
            }

        },
        handleClose(done) {
            done();
        },
        tui(){
            window.history.back(-1);
        }
    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll)
//        console.log(this.$refs.bookheight[0].$el.clientHeight)



    },
    updated(){
        //获取标题数组
        var booklength = this.$refs.booktitletext;
        //用作计算
        var y = 1;

        for(var i=0;i<booklength.length;i++){
            this.page[i]=this.$refs.bookheight[i].$el.clientHeight
        }

        for(var i = 1;i < this.page.length; i++){
            this.page[i] = this.page[i-y] + this.page[i];
        }
        this.booktitle = this.$refs.booktitletext[0].innerText
    }
    };
</script>
