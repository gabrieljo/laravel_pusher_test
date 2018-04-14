<template>
    <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" >
        <el-menu-item index="1">
            <router-link to="/forum">Forum</router-link>
        </el-menu-item>
        <el-menu-item index="2">
            <router-link to="/questions">Ask Question</router-link>
        </el-menu-item>
        <el-menu-item index="3">
            <router-link to="/categories">Category</router-link>
        </el-menu-item>
        <el-menu-item index="4">
            <router-link to="/login">Login</router-link>
        </el-menu-item>

    </el-menu>
</template>
<script>

</script>
<style>
    .el-menu-demo li a{text-decoration:none;}
</style>
