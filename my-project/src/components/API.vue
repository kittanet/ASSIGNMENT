<template>
  <b-container>
      <b-row align-h="center" class="mt-5">
          <b-col cols="8">
              <b-card class="p-3">
                  <h1 class="mb-4">
                      Restaurants in Bangsue
                  </h1>
                  <h5 v-if="names.length != 0" v-for="(item, index) in names">
                    {{ index + 1 }} - {{ item }}
                    <br>
                  </h5>
                  <h5 v-if="names.length == 0">
                    Can't find a restaurant in BangSue.
                  </h5>
              </b-card>
          </b-col>
      </b-row>
  </b-container>
</template>

<script>
export default {
  name: 'api',
    data () {
        return {
          names : []
        }
    },
    created() {
      if(localStorage.getItem('names')){
        this.names = JSON.parse(localStorage.getItem('names'))
      } else {
        this.axios.get('http://localhost:80/zf3-starter-kit/public/api')
        .then(response => {
          if(response.status =="200") {
            localStorage.setItem('names',JSON.stringify(response.data.name))
            this.names = response.data.name
          }
        })
        .catch(e => {
          this.errors.push(e)
        })
      }
  },
}
</script>

<style scoped>
  h1, h5 {
        font-weight: normal;
  }
</style>
