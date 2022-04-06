<template>

  <div class="dairies_vita container">
  <Alert v-if="alert" v-bind:message='alert' />
  <h1 class="page-header">Data Management</h1>
  <input class="form-control" placeholder="Enter the Product" v-model="filterInput">
  <br />
 <table class="table table-striped">
        <thead>
          <tr>
            <th>Product_dairyVITA</th>
            <th>Measurement_dairyVITA</th>
            <th>Realprice_dairyVITA</th>
			<th>Discountedprice_dairyVITA</th>
			<th>Bestbefore_dairyVITA</th>
			<th>Fat_dairyVITA</th>
			<th>Calories_dairyVITA</th>
			<th>Market_dairyVITA</th>
			<th>City_dairyVITA</th>
			<th>Packing_dairyVITA</th>
            <th>Data Management</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="dairyVITA in filterBy(dairies_vita, filterInput)">
            <td>{{dairyVITA.product_dairyVITA}}</td>
            <td>{{dairyVITA.measurement_dairyVITA}}</td>
            <td>{{dairyVITA.realprice_dairyVITA}}</td>
			<td>{{dairyVITA.discountedprice_dairyVITA}}</td>
			<td>{{dairyVITA.bestbefore_dairyVITA}}</td>
			<td>{{dairyVITA.fat_dairyVITA}}</td>
			<td>{{dairyVITA.calories_dairyVITA}}</td>
			<td>{{dairyVITA.market_dairyVITA}}</td>
			<td>{{dairyVITA.city_dairyVITA}}</td>
			<td>{{dairyVITA.packing_dairyVITA}}</td>
                   <td>
		         <router-link class="btn btn-primary" v-bind:to="'/edit/'+dairyVITA.id_dairyVITA">Edit</router-link>       
		    <button class="btn btn-danger" v-on:click="deleteDairyVITA(dairyVITA.id_dairyVITA)"v-bind:message='alert'> Delete</button>
			</td>
		           
          </tr>
        </tbody>
    </table>
  </div>
</template>

  
<script>
//alerti
import Alert from './Alert'

//paraqitja te dhenave
export default {
  name: 'dairies_vita',
  data () {
    return {

      dairies_vita: [],
	  alert:'',
	   filterInput:''
    }
  },
  methods: {
//Paraqitja Te dhenave
	 fetchDairies_vita(){
			this.$http.get('http://slimapp/api/dairies_vita')
			  .then(function(response){
				this.dairies_vita = response.body;
			  });
		},
		filterBy(list, value){
		value=value.charAt(0).toUpperCase()+value.slice(1);
		return list.filter(function(dairyVITA){
		
		return dairyVITA.product_dairyVITA.indexOf(value) > -1;
				});
		},

		deleteDairyVITA(id_dairyVITA){
          this.$http.delete('http://slimapp/api/dairyVITA/delete/'+id_dairyVITA)
          .then(function(response){

          			 this.$router.push({path: '/', query: {alert: 'Dairy Deleted'}});
                 
          });
      }
		
	  }, 
	  created: function(){
	  if(this.$route.query.alert){
	  this.alert = this.$route.query.alert;
	  }
	  this.fetchDairies_vita();
	  },
	  updated: function(){
	  this.fetchDairies_vita();
	  },
	  
	  	  

	 //Paraqitja Alarmit
	  components: {
		Alert
	  }
	  
}
</script>
 
</style>
