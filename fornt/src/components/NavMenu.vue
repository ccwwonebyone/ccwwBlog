<template>
<transition name="nav-menu">
    <el-menu
      default-active="1-1"
      @open="handleOpen"
      @close="handleClose"
      background-color="#545c64"
      text-color="#fff"
      active-text-color="#ffd04b">
      <el-submenu index="1">
        <template slot="title">
            <div>
                <i class="el-icon-location"></i>
                <span>网站</span>
            </div>
        </template>
        <el-menu-item-group>
          <el-menu-item index="1-1">网站概况</el-menu-item>
          <a href="#/company"><el-menu-item index="1-2">网站信息</el-menu-item></a>
        </el-menu-item-group>
      </el-submenu>
      <el-menu-item index="2">
        <i class="el-icon-menu"></i>
        <span slot="title">组件库</span>
      </el-menu-item>
      <el-menu-item index="3">
        <i class="el-icon-document"></i>
        <span slot="title">用户管理</span>
      </el-menu-item>
      <el-menu-item index="4">
        <i class="el-icon-setting"></i>
        <span slot="title">文章管理</span>
      </el-menu-item>
    </el-menu>
</transition>
</template>
<script>
  export default {
    methods: {
      handleOpen(key, keyPath) {
        console.log(key, keyPath);
      },
      handleClose(key, keyPath) {
        console.log(key, keyPath);
      }
    }
  }
</script>