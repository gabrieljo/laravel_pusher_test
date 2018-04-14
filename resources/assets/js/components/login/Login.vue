<template>
    <el-container>
        <el-form
                :model="form"
                status-icon
                label-width="120px"
                class="demo-ruleForm"
                @submit.native.prevent="submitForm"
        >
            <el-form-item label="Username" prop="email">
                <el-input v-model="form.email" auto-complete="off"></el-input>
            </el-form-item>
            <el-form-item label="Password" prop="password">
                <el-input type="password" v-model="form.password" auto-complete="off"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submitForm(form)">Login</el-button>
            </el-form-item>
        </el-form>
    </el-container>
</template>

<script>
export default{
  data(){
    return{
      form:{
        email:null,
        password:null
      }
    }
  },
  methods:{
    submitForm(form){
      User.login(form)
    }
  }
}
</script>

<style>

</style>