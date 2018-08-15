<template>
  <div id="app">
    <el-scrollbar class="content-left" style="height:100%;">
      <div class="content-title">
        Manpro
      </div>
      <nav-menu></nav-menu>
    </el-scrollbar>
    <el-scrollbar  style="height:100%;padding-left:300px;">
      <router-view/>
    </el-scrollbar>
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
  top: 0;
  bottom: 0;
  background-color: #545c64;
  z-index: 1500;
}
.content-title{
  height: 60px;
  font-size: 50px;
  line-height: 60px;
  padding-left: 10px;
  background-color: aliceblue;
}
.el-scrollbar__wrap {
  overflow-x: hidden;
}
</style>
