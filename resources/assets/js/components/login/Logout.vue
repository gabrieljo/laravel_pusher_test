<template>

</template>

<script>
  export default{
   created(){
     //app.js에 지정되어있음
     EventBus.$emit('logout');
   }
  }
</script>

<style>

</style>