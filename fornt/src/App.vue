<template>
  <div id="app">

        <nav-menu></nav-menu>
    <!-- <el-row>
      <div class="content-right">
       <router-view/>
      </div>
    </el-row> -->
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
.body,html{
	margin: 0;
	padding: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
}
.content-right{
  padding-left: 250px;
}
#app{
  width: 100%;
  height: 100%;
  overflow-y: hidden;
}
.el-scrollbar__wrap {
  overflow-x: hidden;
}
</style>
