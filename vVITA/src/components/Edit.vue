<template>
  <div class="edit container">
   <Alert v-if="alert" v-bind:message='alert' />
  <h1 class="page-header">Modify the data</h1>
    <form v-on:submit="updateDairyVITA">
      
        <div class="well">
            <h4>About product</h4>
            <div class="form-group">
                <label>Product</label>
                <input type="text" class="form-control" placeholder="Product" v-model="dairyVITA.product_dairyVITA">
            </div>
			<div class="form-group">
                <label>Best before</label>
                <input type="date" class="form-control" placeholder="Best before" v-model="dairyVITA.bestbefore_dairyVITA">
            </div>
        </div>
        <div class="well">
            <h4>About prices</h4>
            <div class="form-group">
                <label>Real Price</label>
                <input type="text" class="form-control" placeholder="Real Price" v-model="dairyVITA.realprice_dairyVITA">
            </div>
            <div class="form-group">
                <label>Discounted Real Price</label>
                <input type="text" class="form-control" placeholder="Discounted Real Price" v-model="dairyVITA.discountedprice_dairyVITA">
            </div>
        </div>

        <div class="well">
            <h4>Characteristics </h4>
			<div class="form-group">
                <label>Measurement</label>
                <input type="text" class="form-control" placeholder="Measurement" v-model="dairyVITA.measurement_dairyVITA">
            </div>
            <div class="form-group">
                <label>Fat</label>
                <input type="text" class="form-control" placeholder="Fat" v-model="dairyVITA.fat_dairyVITA">
            </div>
            <div class="form-group">
                <label>Calories</label>
                <input type="text" class="form-control" placeholder="Calories" v-model="dairyVITA.calories_dairyVITA">
            </div>
        </div>
		<div class="well">
            <h4>Adress</h4>
            <div class="form-group">
                <label>Market</label>
                <input type="text" class="form-control" placeholder="Market" v-model="dairyVITA.market_dairyVITA">
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" placeholder="City" v-model="dairyVITA.city_dairyVITA">
            </div>
			 <div class="form-group">
			  <h4>Stock</h4>
                <label>Packing</label>
                <input type="text" class="form-control" placeholder="Packing" v-model="dairyVITA.packing_dairyVITA">
            </div>
        </div>
	   
	   
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
  </div>
</template>

<script>
import Alert from './Alert';
export default {
  name: 'Edit',
  data () {
    return {
      dairyVITA: {},
	  alert:''
    }
  },
      methods: {
	        fetchDairy_VITA(id_dairyVITA){
          this.$http.get('http://slimapp/api/dairyVITA/'+id_dairyVITA)
          .then(function(response){
            this.dairyVITA = JSON.parse(response.body);
          });
		  },
        updateDairyVITA(e){
          if(!this.dairyVITA.product_dairyVITA || !this.dairyVITA.bestbefore_dairyVITA){
                this.alert = 'Please fill in all required fields';
            } else {
                let updateDairyVITA = {
                    product_dairyVITA: this.dairyVITA.product_dairyVITA,
                    measurement_dairyVITA: this.dairyVITA.measurement_dairyVITA,
					realprice_dairyVITA: this.dairyVITA.realprice_dairyVITA,
                    discountedprice_dairyVITA: this.dairyVITA.discountedprice_dairyVITA,
                    bestbefore_dairyVITA: this.dairyVITA.bestbefore_dairyVITA,
                    fat_dairyVITA: this.dairyVITA.fat_dairyVITA,
                    calories_dairyVITA: this.dairyVITA.calories_dairyVITA,
					market_dairyVITA: this.dairyVITA.market_dairyVITA,
					city_dairyVITA: this.dairyVITA.city_dairyVITA,
					packing_dairyVITA: this.dairyVITA.packing_dairyVITA
                }

                this.$http.put('http://slimapp/api/dairyVITA/update/'+this.$route.params.id_dairyVITA, updateDairyVITA)
                    .then(function(response){
                        this.$router.push({path: '/', query: {alert: 'Dairy Updated'}});
                    });

                e.preventDefault();
            }
            e.preventDefault();
        }
    },
	 created:function(){
        this.fetchDairyVITA(this.$route.params.id_dairyVITA);
    },
	  components: {
		Alert
	  }
}
</script>
</style>
