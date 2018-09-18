<template>
<transition name="nav-menu">
    <el-menu
      :default-active="activeIndex"
      @select="handleSelect"
      background-color="#545c64"
      text-color="#fff"
      active-text-color="#ffd04b">
      <el-menu-item index="0">
        <i class="el-icon-document"></i>
        <span slot="title">文章</span>
      </el-menu-item>
      <el-menu-item index="1">
        <i class="el-icon-setting"></i>
        <span slot="title">网站配置</span>
      </el-menu-item>
      <el-menu-item index="2">
        <i class="el-icon-menu"></i>
        <span slot="title">分类</span>
      </el-menu-item>
      <el-menu-item index="3">
        <i class="el-icon-star-on"></i>
        <span slot="title">标签</span>
      </el-menu-item>
    </el-menu>
</transition>
</template>
<script>
  export default {
    data(){
      return{
        activeIndex:'1'
      }
    },
    methods: {
      handleSelect(key, keyPath) {
        this.activeIndex = key;
        var menu = ['/article', '/company', '/category', '/tag'];
        this.$router.push(menu[key]);
      }
    }
  }
</script>