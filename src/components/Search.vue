<template>
    <div>
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
            <el-button slot="append">首页</el-button>
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
            <el-col :xs="24"  :lg="12">1</el-col>
            <el-col :xs="24"  :lg="12">2</el-col>
            <el-col :xs="24"  :lg="12">3</el-col>
            <el-col :xs="24"  :lg="12">4</el-col>
        </el-row>



        <el-form ref="form" label-width="80px">
            <el-form-item label="id">
                <el-input v-model="id" disabled></el-input>
            </el-form-item>
            <el-form-item label="标题">
                <el-input v-model="title"></el-input>
            </el-form-item>
            <el-form-item label="链接">
                <el-input v-model="link"></el-input>
            </el-form-item>
            <el-form-item label="作者">
                <el-input v-model="author"></el-input>
            </el-form-item>
            <el-form-item label="显隐">
                <el-select v-model="tag" placeholder="请选择">
                    <el-option label="显示" value="1"></el-option>
                    <el-option label="隐藏" value="0"></el-option>
                </el-select>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="updateBlog">立即修改</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>
<style>
    .head {
        display: none;
    }
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
        this.$http.get("getBlogById/" + this.$route.params.id).then(result => {
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
    }
    };
</script>
