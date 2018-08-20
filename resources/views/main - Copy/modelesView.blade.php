@extends('../layouts.app')

@section('style')
<!-- <link href="{{ asset('css/projet.css') }}" rel="stylesheet"> -->

@endsection


@section('content')

<div id="modeles">

    <table id="dataTable" class="col-sm-10 table table-striped">
				<thead>
					 <tr>
					 <th scope="col">nom</th>
					 <th scope="col">etape</th>
					 <th scope="col">langue</th>
					 <th scope="col">documents</th>
					 </tr>
				</thead>
				<tbody>
				
				<tr v-for="m in modeles" >
				<!-- <tr v-for="p in Projects" >		 -->
					 <th scope="col" v-on:click.prevent="go(m.id)">@{{m.nom}} </th>
					 <th scope="col" v-on:click.prevent="go(m.id)">@{{m.etapeProjet}}</th>
					 <td scope="col" v-on:click.prevent="go(m.id)">@{{m.langue}}</td>
					 <td scope="col" v-on:click.prevent="go(m.id)">@{{m.documents_count}}</td>
										
				</tr>
				
					 
				</tbody>
    </table>

</div>

@endsection




@section('script')

<script>

new Vue({
     el:'#modeles',
     data:{
         modeles,

     },
     mounted:function(){
        this.getModeles()

     },
     methods:{

         getModeles(){
            this.$http.get('/apiModele').then( (data) => 
						  { 
								
								this.modeles=data.data;
								console.log(this.modeles);                                
								
								setTimeout( ()=>{ this.data() } ,1000);

						  });
         },
         data(){

            $('#dataTable').DataTable();

        },
        go(id){

            window.location.href = "/modeles/"+id;

        }

     }

});

 $(".sidebar-nav li").removeClass("active")	
	 setTimeout(() => {
		
		$(".modele").addClass("active");	
	 },500)


</script>

@endsection
