<template lang="html">
    <b-container>
        <b-row align-h="center" class="mt-5">
            <b-col cols="8">
                <b-card class="p-3">
                    <h1 class="mb-4">
                        Finding X value
                    </h1>
                    <h5 class="mb-3">
                        <span v-for="item in list">
                            {{ item }},
                        </span>
                        X
                    </h5>
                    <h5 class="mb-3">
                       X is {{ findX }}
                    </h5>
                </b-card>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
export default {
    name: 'test',
    data () {
        return {
        list: [3, 5, 9, 15],
        show: true
        }
    },
    computed: {
        findX () {
            var len = 4
            while(len > 1){
                len--
                for(var i = 0; i < len; i++){
                    this.list[i] = this.list[i + 1] - this.list[i]
                }
                for(var i = 1; i < len; i++){
                    if (this.list[i] != this.list[i - 1]){
                        break
                    }
                }
                if (i != len){
                   break
                }
            }
            var iteration = 4 - len
            for(var i = len; i < len + 1; i++){
                this.list[i] = this.list[i - 1]
            }
            len += 1
            for (var i = 0; i < iteration; i++){
                len++; 
                for (var j = len - 1; j > 0; j--){
                    this.list[j] = this.list[j - 1]; 
                }
                this.list[0] = 3;
                for (var j = 1; j < len; j++){
                    this.list[j] = this.list[j - 1] + this.list[j]; 
                }
            }
            return this.list[4]
        }
    }
}
</script>

<style lang="css">
    body {
        background: #EEF1F4
    }
</style>