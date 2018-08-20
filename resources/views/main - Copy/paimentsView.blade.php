@extends('../layouts.app')

@section('style')
<!-- <link href="{{ asset('css/projet.css') }}" rel="stylesheet"> -->

@endsection


@section('content')

<div id="paiments">
<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target=".bd-create-modal-sm">Nouveau Client</button>	

<div class="col-12 modal fade bd-create-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					 <div class="col-12  modal-content">

					 <div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						  </button>
					 </div>

					 <table id="dataTable2" class="col-sm-10 table table-striped">
								<thead>
									<tr>
									<th scope="col">client</th>
									<th scope="col">projet</th>
									</tr>
								</thead>
								<tbody>
								
								<tr v-for="pr in projets" >
								<!-- <tr v-for="p in Projects" >	  -->	
									<th scope="col" v-on:click.prevent="selectC(pr.projet.id)">@{{pr.client.nom}} @{{pr.client.prenom}}</th>														
									<th scope="col" v-on:click.prevent="selectC(pr.projet.id)">@{{pr.projet.nomProjet}}</th>														
								</tr>
								
									
								</tbody>
					</table>
					

					 
					 <form id="paimentForm" class="none row form-horizontal" method="POST" v-on:submit.prevent="paimentSubmit">
						  @csrf

						  <div class="col-sm-6" >
						  <div class="form-group">
						  <label for="idProjet" class="col-sm-6 control-label">id</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="idProjet" v-model="id" name="idProjet" placeholder="Nom">
						  </div>
						  </div>


						  <div class="form-group">
						  <label for="montant" class="col-sm-6 control-label">Montant</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="montant" name="montant" placeholder="montant">
						  </div>
						  </div>



						  <div class="form-group">
						  <div class="col-sm-offset-2 col-sm-10">
								<button type="submit" id="paimentSubmit" class="btn btn-default"> Suivant -></button>
						  </div>
						  </div>


						  </div>

					 </form>

					 


				
					 </div>
				</div>
	</div>


    <table id="dataTable" class="col-sm-10 table table-striped">
				<thead>
					 <tr>
					 <th scope="col">Projet</th>
					 <th scope="col">Montant</th>
					 <th scope="col">date</th>
					 </tr>
				</thead>
				<tbody>
				
				<tr v-for="p in paiments" >
				<!-- <tr v-for="p in Projects" >		 -->
					 <th scope="col" v-on:click.prevent="go(p.id)">@{{p.nomProjet}} </th>
					 <th scope="col" v-on:click.prevent="go(p.id)">@{{p.montant}}</th>
					 <td scope="col" v-on:click.prevent="go(p.id)">@{{p.created_at}}</td>
										
				</tr>
				
					 
				</tbody>
    </table>

</div>

@endsection




@section('script')

<script>

new Vue({
     el:'#paiments',
     data:{
		 id:'',
		projets:'',
		paiments,

     },
     mounted:function(){
        this.getPaiments()
		this.getProjects()
     },
     methods:{

         getPaiments(){
            this.$http.get('/apiPaiment').then( (data) => 
						  { 
								
								this.paiments=data.data;
								console.log(data.data);                                
								
								setTimeout( ()=>{ this.data() } ,1000);

						  });
         },
		 getProjects(){
					 
					 this.$http.get('/apiProjet').then( (data) => 
						  { 
								
								console.log(data.data);
								this.projets=data.data.listProjets;
								
								setTimeout( ()=>{ this.data() } ,1000);

						  });

					 
				},
				paimentSubmit(){
					 let paimentForm = document.getElementById('paimentForm');
					 let formData= new FormData(paimentForm);
					 console.log(formData);
					 this.$http.post('/apiPaiment', formData).then( (data) => 
						  { 
								this.getPaiments();
								console.log(data);
								$("#dataTable2").removeClass("none"); 
								this.reset("#clientForm");
								$("#paimentForm").addClass("none");
								this.reset("#paimentForm");
								$(".close").click();


						  });
				},
				reset(form){
					$(form).find('input:text, input:password, select, textarea').val('');
        			$(form).find('input:radio, input:checkbox').prop('checked', false);
				},
				selectC(id){
					this.id=id
					$("#paimentForm").removeClass("none");
					$("#dataTable2").addClass("none");

				},
         data(){

            $('#dataTable').DataTable();
            $('#dataTable2').DataTable();

        },
        go(id){

            window.location.href = "/paiments/"+id;

        }

     }

});

 $(".sidebar-nav li").removeClass("active")	
	 setTimeout(() => {
		
		$(".paiment").addClass("active");	
	 },500)
</script>

@endsection
