<template>
  <div id="app">
    <!--头部-->
    <el-row :gutter="10" class="head" v-show="homepage">
      <el-col :xs="5" :lg="5"><div class="logo"><router-link to="/"><img src="./assets/logo.png"></router-link></div></el-col>
      <el-col :xs="14" :lg="14">
        <div class="nan_nv">
          <el-button-group>
            <el-button type="primary" size="small" icon="el-icon-arrow-left" v-on:click="goMan">男</el-button>
            <el-button type="danger" size="small" v-on:click="goWoman">女<i class="el-icon-arrow-right el-icon--right"></i></el-button>
          </el-button-group>
        </div>
      </el-col>
      <el-col :xs="5" :lg="5" class="textRight">
        <span v-if="homepage">
          <i class="iconfont iconhuiyuan"></i>
          <router-link to="/listBlog"><i class="iconfont iconshujia"></i></router-link>
        </span>
          <!--导航条-->
        <el-dropdown trigger="click" v-else>
          <span class="el-dropdown-link">
            <i class="el-icon-arrow-down el-icon-tickets"></i>
          </span>
          <el-dropdown-menu slot="dropdown">
            <el-dropdown-item><router-link to="/">首页</router-link></el-dropdown-item>
            <el-dropdown-item><router-link to="/listBlog">我的书架</router-link></el-dropdown-item>
          </el-dropdown-menu>
        </el-dropdown>

      </el-col>
      <br>
    </el-row>
    <router-view></router-view>
    <el-row v-show="footshow">
      <el-col :span="24" class="textCenter">copyright © 2019 abc.com</el-col>
    </el-row>

  </div>
</template>

<style>
  a {
    text-decoration: none;
  }
  .logo img{
    width: 2.3rem;
  }
  .nan_nv{
    text-align: center;
  }
  .iconhuiyuan,.iconshujia{
    font-size: 1.3rem;
    margin: 0.3rem;
    line-height: 2rem;
    color: #F56C6C;
  }
  .el-icon-tickets{
    font-size:2rem;
  }
  .textRight{
    text-align: right;
  }
  .textCenter{
    text-align: center;
  }
  .f_left{
    float: left;
  }
  .f_right{
    float: right;
  }
</style>

<script>
  export default {
    data() {
      return {
        homepage:true,
        footshow:true
      }
    },
    methods: {
      open() {
        this.$message('这是一条消息提示');
      },

      openVn() {
        const h = this.$createElement;
        this.$message({
          message: h('p', null, [
            h('span', null, '内容可以是 '),
            h('i', { style: 'color: teal' }, 'VNode')
          ])
        });
      },

      ifHome () {
//        console.log(this.$route.path)
        const path = this.$route.path
        if(path == '/'|| path=='/woman'){
          this.homepage=true
          this.footshow=true
        }else {
          this.homepage=false
          this.footshow=false
        }
      },

      //跳转页面
      goMan(){
        this.$router.push({path:'/'})
      },
      goWoman(){
        this.$router.push({path:'/woman'})
      }
    },
    mounted(){
      this.ifHome()
    },
  watch: {
    // 如果路由有变化， 执行该方法
    '$route': 'ifHome'
  }
  }
</script>


