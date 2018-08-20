@extends('../layouts.app')

@section('style')
<style>


#topH{
    position: absolute;
    top:5px;
    font-size: 30px;
}

</style>


@endsection


@section('content')

<div id="document">

    <div id="topH" class=" row col-12">
        <span  class="col-12 projetName" data-toggle="modal" data-target=".bd-project-modal-lg" >@{{nomDocument}}</span>
    </div>
    <input type="hidden" id="projectId" value={{$id}} >
    
    <div id="docContent"  >

	</div>



</div>
    

@endsection

@section('script')
<script>
new Vue({

    el:'#document',
    data:{
        id: $("#projectId").val(),
        document,
        nomDocument:" cjzekcj",

    },
    mounted: function(){
        this.getContent()

    },
    methods:{

        getContent(){
            this.$http.get('/apiDocument/'+this.id).then( (data) => 
						  { 
                              this.document=data.data;
                              this.nomDocument=this.document.titre;
                              $("#docContent").html(this.document.contenu);
                          }
            );          
        },
        

        
    }
});

</script>



@endsection


