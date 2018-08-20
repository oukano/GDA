@extends('../layouts.app')

@section('style')
<!-- <link href="{{ asset('css/projet.css') }}" rel="stylesheet"> -->

<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

<style>
.col-3 {
    text-align: center;
    font-size: 26px;
    font-weight: bold;
    color:#fff;
}
h3{
  margin-top:20px;
  padding-left:10px
}
</style>
@endsection


@section('content')
<div id="bord">
  <div class="row">

    <div class="col-3"style="background-color:#2ecc71">
      <div >Projets</div>
      <div>@{{nbrProjet}}</div>      
    </div>

    <div class="col-3" style="background-color:#e74c3c">
      <div>Client</div>
      <div>@{{nbrClient}}</div> 
    </div>

    <div class="col-3" style="background-color:#3498db" >
      <div>Document</div>
      <div>@{{nbrDocument}}</div> 
    </div>
    <div class="col-3" style="background-color:#f1c40f">
      <div>Modeles</div>
      <div>@{{nbrModele}}</div> 
    </div>
  </div>
  <div class="row">

  
  <div class="col-6 " >
    <h3>Nombre de projet par mois :</h3>
    <div class="ct-chart ct-perfect-fourth">
    </div>
  </div>  
  <div class="col-6 " >
    <h3>Nombre de client par mois :</h3>
    <div class="ct-chart2 ct-perfect-fourth">
    </div>
  </div>  
  </div>
</div>
@endsection

@section('script')


<script>

var vu = new Vue({
		  el:'#bord',

		  
		  data:{
        Projects:[],
        nbrProjet:String,
        nbrClient:String,
        nbrDocument:String,
        nbrModele:String,
        Clients:[],
        data:[0,0,0,0,0,0,0],
        data2:[0,0,0,0,0,0,0],
      },
      mounted:function(){
        this.getProjects();
        this.getClients();
        this.getDocuments();
        this.getModeles();
        

      },
      methods:{
        getProjects(){
					 
					 this.$http.get('/apiProjet').then( (data) => 
						  { 
								
								console.log(data.data);

                this.Projects=data.data.listProjets;
                this.nbrProjet=this.Projects.length;
								console.log(this.nbrProjet + "*************"+this.Projects.length);
                
                this.projectBoard();
                // this.clientBoard();

						  });

					 
        },
        getClients(){
					 
					 this.$http.get('/apiClient').then( (data) => 
						  { 
								
								console.log(data.data);

								this.Clients=data.data;
								this.nbrClient=this.Clients.length;
                // this.projectBoard();
                this.clientBoard();

						  });

					 
        },
        getDocuments(){
					 
					 this.$http.get('/apiDocument').then( (data) => 
						  { 
								
								console.log("lkjknjk"+data.data);

								this.nbrDocument=data.data.length;
                // this.projectBoard();

						  });

					 
        },
        getModeles(){
					 
					 this.$http.get('/apiModele').then( (data) => 
						  { 
								
								console.log("lkjknjk"+data.data);

								this.nbrModele=data.data.length;
                // this.projectBoard();
                

						  });

					 
        },
        projectBoard(){
          for (i = 0; i < this.Projects.length; i++) { 

              month=new Date(this.Projects[i].projet.created_at).getMonth()+1;
              console.log(month);

              if(month==1){
                this.data[0]+=1;
              }else if(month==2){
                this.data[1]+=1; 
              }else if(month==3){
                this.data[2]+=1; 
              }else if(month==4){
                this.data[3]+=1; 
              }else if(month==5){
                this.data[4]+=1; 
              }else if(month==6){
                this.data[5]+=1; 
              }else if(month==7){
                this.data[6]+=1; 
              }else if(month==8){
                this.data[7]+=1; 
              }

          }

          data = {
          labels: ['Janvier', 'Fevrier', 'Mars', 'avril', 'Mai','Juin','juiller'],
          series: [this.data]
          };
          console.log(this.data);
          new Chartist.Line('.ct-chart', data , {low: 0,showArea: true}); 
        },
        clientBoard(){
          console.log("client");
          
          for (i = 0; i < this.Clients.length; i++) { 

              month=new Date(this.Clients[i].created_at).getMonth()+1;
              console.log(month);
              if(month==1){
                this.data2[0]+=1;
                console.log("found");
              }else if(month==2){
                this.data2[1]+=1; 
                console.log("found");
                
              }else if(month==3){
                this.data2[2]+=1;
                console.log("found");
                 
              }else if(month==4){
                this.data2[3]+=1; 
                console.log("found");
                
              }else if(month==5){
                this.data2[4]+=1; 
                console.log("found");
                
              }else if(month==6){
                this.data2[5]+=1;
                console.log("found");
                
              }else if(month==7){
                this.data2[6]+=1; 
                console.log("found");
                
              }else if(month==8){
                this.data2[7]+=1; 
                console.log("found");
                
              }

          }

          data = {
          labels: ['Janvier', 'Fevrier', 'Mars', 'avril', 'Mai','Juin','juiller'],
          series: [this.data2]
          };
          console.log(this.data);
          new Chartist.Line('.ct-chart2', data , {low: 0,showArea: true}); 
        }
      }
})
    

// console.log(vu.$data.data);
// new Chartist.Line('.ct-chart', data);
</script>

@endsection
