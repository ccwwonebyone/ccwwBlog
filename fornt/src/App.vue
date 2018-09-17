<template>
  <div id="app">
    <template v-if="this.$route.name.toLowerCase() == 'login'">
      <router-view/>
    </template>
    <template v-else>
      <div class="content-title">
        <img src="/imgs/brand.png" width="200" height="70" alt="oneBlog">
      </div>
      <div style="height:100%;">
        <el-scrollbar class="content-left" style="height:100%;">
        <nav-menu></nav-menu>
        <div class="copy">copyright©️<el-button type="text">ccwwBlog</el-button></div>
        </el-scrollbar>
        <el-scrollbar  style="height:100%;padding-left:300px;">
          <router-view/>
        </el-scrollbar>
      </div>

    </template>
  </div>
</template>

<script>
import NavMenu from '@/components/NavMenu'

export default {
  name: 'App',
  components: {
      NavMenu
  }
}
</script>

<style>
body,html{
	margin: 0;
	padding: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
}
#app{
  width: 100%;
  height:100%;
  overflow-y: hidden;
  min-height: auto;
}
.content-left{
  width: 300px;
  position: fixed;
  background-color: #545c64;
  z-index: 1500;
}
.copy{
  color: #fff;
  position: fixed;
  bottom: 20px;
  left: 20px;
}
.content-title{
  color: #fff;
  height: 70px;
  font-size: 60px;
  line-height: 60px;
  padding-left: 30px;
  background-color: #343a40;
}
.el-scrollbar__wrap {
  overflow-x: hidden;
}
</style>
