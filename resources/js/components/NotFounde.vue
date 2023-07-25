<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center mt-5">
        <h3 class="display-1 text-success">404</h3>
        <h1 class="display-4">Page Not Found</h1>
        <p class="lead">The page you are looking for does not exist.</p>
        <router-link :to="'/currency/list'" class="btn btn-success">Go Back</router-link>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        name: 'NotFound',
    }
</script>