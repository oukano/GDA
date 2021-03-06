@extends('../layouts.app')

@section('style')
<!-- <link href="{{ asset('css/projet.css') }}" rel="stylesheet"> -->

@endsection


@section('content')

<div id="documents">
	<div class="empty-button"></div>

    <table id="dataTable" class="col-sm-10 table table-striped">
				<thead>
					 <tr>
					 <th scope="col">nom</th>
					 <th scope="col">Projet</th>
					 <th scope="col">client</th>
					 <th scope="col">date</th>
					 </tr>
				</thead>
				<tbody>
				
				<tr v-for="d in documents" >
				<!-- <tr v-for="p in Projects" >		 -->
					 <th scope="col" v-on:click.prevent="go(d.id)">@{{d.titre}} </th>
					 <th scope="col" v-on:click.prevent="go(d.id)">@{{d.nomProjet}}</th>
					 <td scope="col" v-on:click.prevent="go(d.id)">@{{d.nomClient}}</td>
					 <td scope="col" v-on:click.prevent="go(d.id)">@{{d.created_at}}</td>
										
				</tr>
				
					 
				</tbody>
    </table>

</div>

@endsection




@section('script')

<script>

new Vue({
     el:'#documents',
     data:{
         documents,

     },
     mounted:function(){
        this.getDocuments()

     },
     methods:{

         getDocuments(){
            this.$http.get('/apiDocument').then( (data) => 
						  { 
								
								this.documents=data.data;
								// console.log(data.data);                                
								
								setTimeout( ()=>{ this.data() } ,1000);

						  });
         },
         data(){

           $('#dataTable').DataTable({
			retrieve: true,
			"language": {
				"lengthMenu": "Afficher _MENU_ Par page",
				"zeroRecords": "Aucun enregistrement disponible",
				"info": "Page _PAGE_/_PAGES_",
				"infoEmpty": " ",
				"infoFiltered": "(filtered from _MAX_ total records)",
				"sSearch": '<i class="fa fa-search" aria-hidden="true"></i>',
				"oPaginate": {
					"sNext": "Suivant",
					"sPrevious": "Précédant"
				}
			}
		});

        },
        go(id){

            window.location.href = "/documents/"+id;

        }

     }

});

 $(".sidebar-nav li").removeClass("active")	
	 setTimeout(() => {
		
		$(".document").addClass("active");	
	 },500)
</script>

@endsection
