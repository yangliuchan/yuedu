<template>
    <div class="search_page">
        <!--搜索框-->
        <el-autocomplete
                v-model="wd"
                :fetch-suggestions="querySearchAsync"
                placeholder="请输入内容"
                @select="handleSelect"
                class="search"
                @keyup.enter.native = "clickEnter">
            <i
                    class="iconfont iconfangdajing"
                    slot="prefix"
                    @click="search">
            </i>
            <el-button slot="append" @click="goMan">首页</el-button>
        </el-autocomplete>

        <el-row class="top10">
            <el-col :span="16">
                <el-radio-group v-model="paixu" size="small">
                    <el-radio-button label="1">推荐</el-radio-button>
                    <el-radio-button label="2">时间</el-radio-button>
                    <el-radio-button label="3">字数</el-radio-button>
                    <el-radio-button label="4">点击</el-radio-button>
                </el-radio-group>
            </el-col>
            <el-col :span="8" class="shaixuan textRight">
                <el-button type="primary" size="small" icon="el-icon-date" @click="shaixuan_key = true">筛选</el-button>
            </el-col>
        </el-row>

        <el-dialog title="筛选" :visible.sync="shaixuan_key" class="shaixuan_text">
            <div class="fenlei_title">分类</div>
            <el-radio-group v-model="fenlei" size="small">
                <el-radio-button label="1">玄幻</el-radio-button>
                <el-radio-button label="2">奇幻</el-radio-button>
                <el-radio-button label="3">武侠</el-radio-button>
                <el-radio-button label="4">仙侠</el-radio-button>
                <el-radio-button label="5">都市</el-radio-button>
                <el-radio-button label="6">历史</el-radio-button>
            </el-radio-group>

            <div class="fenlei_title">字数</div>
            <el-radio-group v-model="fenlei" size="small">
                <el-radio-button label="1">30万以下</el-radio-button>
                <el-radio-button label="2">30-50万字</el-radio-button>
                <el-radio-button label="3">50-100万字</el-radio-button>
                <el-radio-button label="4">100-200万字</el-radio-button>
                <el-radio-button label="5">200万字以上</el-radio-button>
            </el-radio-group>
            <div>
                <el-button>重置</el-button>
                <el-button type="primary" @click="shaixuan_key = false">完成</el-button>
            </div>
        </el-dialog>

        <el-row :gutter="10" class="xiaoshuoList">

            <el-col :xs="24"  :lg="8" class="book-list">
                <router-link to="/book/id">
                    <el-col :xs="8"  :lg="8">
                        <img src="//bookcover.yuewen.com/qdbimg/349573/1014226539/150" class="book-cover" alt="梦魇剑主">
                    </el-col>
                    <el-col :xs="16"  :lg="16">
                        <h4 class="book-title">重生之最强黑科技</h4>
                        <p class="book-desc">
                            百年之战落幕，科技不兴，武道长隆，世间以武道强者为尊。不得志的平凡少年无意间进入一个神奇的梦境，
                            获得了无数闻所未闻的剑技和体术，自此踏上武道强者之路。蛇噬、锐爪、蜂鸣八度......来自刀剑神域的
                            连击剑技。刚力罗、狮子歌歌、三十六烦恼风......大剑豪罗罗诺亚·索隆的霸道剑术。六式、生命归还、
                            霸气......CP9最强者罗布·路奇超越极限的体技。当这些得自于梦境中的强悍武技出现在武</p>
                        <div class="book-meta">
                            <div class="book-meta-l f_left">
                                作者 金海浅
                            </div>
                            <div class="book-meta-r f_right">
                                <span class="tag-small-group origin-right">
                                    <em class="tag-small gray">科幻</em><em class="tag-small red">连载</em><em class="tag-small blue">10.86万字</em>
                                </span>
                            </div>
                        </div>
                    </el-col>
                </router-link>

            </el-col>

            <el-col :xs="24"  :lg="8" class="book-list">
                <el-col :xs="8"  :lg="8">
                    <img src="//bookcover.yuewen.com/qdbimg/349573/1014226539/150" class="book-cover" alt="梦魇剑主">
                </el-col>
                <el-col :xs="16"  :lg="16">
                    <h4 class="book-title">重生之最强黑科技</h4>
                    <p class="book-desc">
                        百年之战落幕，科技不兴，武道长隆，世间以武道强者为尊。不得志的平凡少年无意间进入一个神奇的梦境，
                        获得了无数闻所未闻的剑技和体术，自此踏上武道强者之路。蛇噬、锐爪、蜂鸣八度......来自刀剑神域的
                        连击剑技。刚力罗、狮子歌歌、三十六烦恼风......大剑豪罗罗诺亚·索隆的霸道剑术。六式、生命归还、
                        霸气......CP9最强者罗布·路奇超越极限的体技。当这些得自于梦境中的强悍武技出现在武</p>
                    <div class="book-meta">
                        <div class="book-meta-l f_left">
                            作者 金海浅
                        </div>
                        <div class="book-meta-r f_right">
                                <span class="tag-small-group origin-right">
                                    <em class="tag-small gray">科幻</em><em class="tag-small red">连载</em><em class="tag-small blue">10.86万字</em>
                                </span>
                        </div>
                    </div>
                </el-col>
            </el-col>

            <el-col :xs="24"  :lg="8" class="book-list">
                <el-col :xs="8"  :lg="8">
                    <img src="//bookcover.yuewen.com/qdbimg/349573/1014226539/150" class="book-cover" alt="梦魇剑主">
                </el-col>
                <el-col :xs="16"  :lg="16">
                    <h4 class="book-title">重生之最强黑科技</h4>
                    <p class="book-desc">
                        百年之战落幕，科技不兴，武道长隆，世间以武道强者为尊。不得志的平凡少年无意间进入一个神奇的梦境，
                        获得了无数闻所未闻的剑技和体术，自此踏上武道强者之路。蛇噬、锐爪、蜂鸣八度......来自刀剑神域的
                        连击剑技。刚力罗、狮子歌歌、三十六烦恼风......大剑豪罗罗诺亚·索隆的霸道剑术。六式、生命归还、
                        霸气......CP9最强者罗布·路奇超越极限的体技。当这些得自于梦境中的强悍武技出现在武</p>
                    <div class="book-meta">
                        <div class="book-meta-l f_left">
                            作者 金海浅
                        </div>
                        <div class="book-meta-r f_right">
                                <span class="tag-small-group origin-right">
                                    <em class="tag-small gray">科幻</em><em class="tag-small red">连载</em><em class="tag-small blue">10.86万字</em>
                                </span>
                        </div>
                    </div>
                </el-col>
            </el-col>

        </el-row>

        <!--<el-form ref="form" label-width="80px">-->
            <!--<el-form-item label="id">-->
                <!--<el-input v-model="id" disabled></el-input>-->
            <!--</el-form-item>-->
            <!--<el-form-item label="标题">-->
                <!--<el-input v-model="title"></el-input>-->
            <!--</el-form-item>-->
            <!--<el-form-item label="链接">-->
                <!--<el-input v-model="link"></el-input>-->
            <!--</el-form-item>-->
            <!--<el-form-item label="作者">-->
                <!--<el-input v-model="author"></el-input>-->
            <!--</el-form-item>-->
            <!--<el-form-item label="显隐">-->
                <!--<el-select v-model="tag" placeholder="请选择">-->
                    <!--<el-option label="显示" value="1"></el-option>-->
                    <!--<el-option label="隐藏" value="0"></el-option>-->
                <!--</el-select>-->
            <!--</el-form-item>-->
            <!--<el-form-item>-->
                <!--<el-button type="primary" @click="updateBlog">立即修改</el-button>-->
            <!--</el-form-item>-->
        <!--</el-form>-->
    </div>
</template>
<style>
    .search{
        width: 100%;
        text-align: center;
    }
    .search .iconfangdajing{
        line-height: 40px;
    }
    .top10{
        margin-top:10px;
    }
    .shaixuan_text .el-dialog{
        width: 90%;
    }
    .shaixuan_text .el-dialog__header{
        padding:10px 10px 0 10px;
    }
    .shaixuan_text .el-dialog__body{
        padding:5px 10px;
    }
    .shaixuan_text .el-radio-group{
        margin-bottom: 10px;
    }
    .shaixuan_text .el-radio-button__inner{
        border-left: 1px solid #DCDFE6;
        border-radius:4px;
        margin: 5px 0 0 5px;
    }
    .fenlei_title{
        border-bottom: 1px solid #DCDFE6;
        font-size: 16px;
        line-height: 30px;
        font-weight: bold;
    }

    .book-cover{
        width: 100%;
    }
    .book-title{
        margin: 5px auto;
    }
    .book-desc{
        height: 5.5rem;
        display: -webkit-box;
        overflow: hidden;
        font-size: 0.8rem;
        margin: 5px auto;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        color: #969ba3;
        line-height: 1.4rem;
    }
    .book-list{
        margin-top: 1rem;
    }
    .book-meta{
        font-size: 0.6rem;
        color: #969ba3;
    }
    .gray {
        color: #969ba3;
    }
    .red {
        color: #ed424b;
    }
    .blue {
        color: #4284ed;
    }
    .tag-small-group em{
        border: 1px solid;
        font-size: 0.3rem;
        margin: 0 0.1rem;
        padding: 0 0.2rem;
    }

</style>
<script>
    export default {
        data() {
        return {
            id: "",
            title: "",
            link: "",
            author: "",
            tag: "",
            wd:"",
            timeout:  null,
            paixu:"1",
            isCollapse: true,
            shaixuan_key: false,
            fenlei:""
        };
    },
    created() {
//        console.log(this.$route);
        this.$http.get("getBlogById/" + this.$route.params.keyword).then(result => {
            // 注意： 通过 $http 获取到的数据，都在 result.body 中放着
            var result = result.body;
            if (result.code === 200) {
                // 成功了
                this.id = result.data.id;
                this.title = result.data.title;
                this.link = result.data.link;
                this.author = result.data.author;
                this.tag = result.data.tag;
            } else {
                // 失败了
                alert("获取数据失败！");
            }
        });
    },
    methods: {
        //跳转页面
        goMan(){
            this.$router.push({path:'/'})
        },
        handleOpen(key, keyPath) {
            console.log(key, keyPath);
        },
        handleClose(key, keyPath) {
            console.log(key, keyPath);
        },
        updateBlog() {
            this.$http
                    .put("updateBlog", {
                        id: this.id,
                        title: this.title,
                        link: this.link,
                        author: this.author,
                        tag: this.tag
                    })
                    .then(result => {
                var result = result.body;
                if (result.code === 200) {
                    alert("修改成功！");
                } else {
                    // 失败了
                    alert("修改失败！");
                }
            });
        },
        loadAll()
        {
            return [
                {"value": "三全鲜食（北新泾店）", "address": "长宁区新渔路144号"},
                {"value": "Hot honey 首尔炸鸡（仙霞路）", "address": "上海市长宁区淞虹路661号"},
                {"value": "新旺角茶餐厅", "address": "上海市普陀区真北路988号创邑金沙谷6号楼113"},
                {"value": "泷千家(天山西路店)", "address": "天山西路438号"}
            ];
        },
        //queryString 为在框中输入的值
        //cb 回调函数,将处理好的数据推回
        querySearchAsync(queryString, cb) {
            var restaurants = this.restaurants;
            var results = queryString ? restaurants.filter(this.createStateFilter(queryString)) : restaurants;

            clearTimeout(this.timeout);
            this.timeout = setTimeout(() => {
                cb(results);
            }, 3000 * Math.random());
        },
        createStateFilter(queryString) {
            return (state) => {
                return (state.value.toLowerCase().indexOf(queryString.toLowerCase()) === 0);
            };
        },
        handleSelect(item) {
            console.log(item);
            this.$router.push({path:'/' +   item.value})
        },
        search() {
            //console.log(ev);
            this.$router.push({path:'/search/' +   this.wd})
            //this.$router.push({path:'/' +   ev.value})
        },
        clickEnter(queryString) {
            console.log(this.wd);
//            this.$router.push({path:'/' +   ev.value})
        }
    },
    mounted() {
        this.restaurants = this.loadAll();
    }
    };
</script>
