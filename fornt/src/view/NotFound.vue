<template>
  <el-card class="box-card">
    <div slot="header" class="clearfix">
      <h1>oh~ 发现了 <el-button type="text" @click="handleSelect()">不得了的东西！</el-button> </h1>
    </div>
  </el-card>
</template>
<script>
  export default {
    methods: {
      handleSelect() {
        this.$router.push('/');
      }
    }
  }
</script>
