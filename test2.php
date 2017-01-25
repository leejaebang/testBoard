<?php //require_once("./lib/warring.php");?>
<?php include './common/header.php';?>
<?php include './common/jqgrid.php';?>	

<div class="panel box-shadow-none text-left content-header">
	<div class="panel-body">
		<div style='margin-top: 50px;'>&nbsp;</div>
		<!-- <div class="col-md-12">
			<h3 class="animated fadeInLeft">순위 체크 관리</h3>
		</div> -->
	</div>

 	<div style="margin-left: 30px;">
		<table id="test"></table>
		<div id="Pager"></div>
	</div>
</div> 

<script type="text/javascript" src="./js/ajaxFileUpload.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $("#test").jqGrid({
        url: 'testData.php',
        mtype: 'GET',
        editurl: 'testEdit.php',
        datatype: 'json',
        page: 1,
        colModel: [
            {
				label: "번호",
                name: 'no',
                index: 'no',
				keys: true,
				align:'center', 
                width: 40
            },
			{
    			label:'이미지',
                name:'img_name',
                index:'img_name',
                autowidth:true,
                //formatter:alarmFormatter,
                editable:true,
                edittype:'custom', 
                editoptions:{
                    custom_element: ImgUpload, 
                    custom_value: GetImgValue
                    }
            },
            {
            	label: '작성일',
            	name: 'write_date',
            	index: 'write_date',
            	align:'center',
            	width: 100
            }
        ],
        autowidth: true,
        height: 600,
		sortname: 'no',
		sortorder : 'desc',
		loadonce: true,
		viewrecords: true,
        rowNum: 15,
        pager: "#Pager"
    });

    
    
    $('#test').navGrid('#Pager',
            // the buttons to appear on the toolbar of the grid
            { edit: true, add: true, del: true, search: false, refresh: false, view: false, position: "left", cloneToTop: false },
            // options for the Edit Dialog
            {
                height: 'auto',
                width: 620,
                editCaption: "The Edit Dialog",
                recreateForm: true,
                closeAfterEdit: true,
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                }
            },
            // options for the Add Dialog
            {
                height: 'auto',
                width: 620,
                closeAfterAdd: true,
                recreateForm: true,
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                }
            },
            // options for the Delete Dailog
            {
                height: 'auto',
                width: 620,
                editCaption: "The Edit Dialog",
                recreateForm: true,
                closeAfterEdit: true,
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                }
            });
});

function alarmFormatter(cellvalue, options, rowdata){
    return '<img src="./temp/menutop.jpg" style="width:50x;height:50px" />'
}

function ImgUpload(value, editOptions) {
    var span = $("<span>");
    var hiddenValue = $("<input>",{type:"hidden", val:value, name:"fileName", id:"fileName"});
    var image = $("<img>",{name:"uploadImage", id:"uploadImage",value:'',style:"display:none;width:80px;height:80px"});
    var el = document.createElement("input");
    el.type = "file";
    el.id = "imgFile";
    el.name = "imgFile";
    el.onchange = UploadFile;
    span.append(el).append(hiddenValue).append(image);
    return span;
}

function UploadFile() {
    $.ajaxFileUpload({
        url : './fileupload.php',
        type : 'POST',
        secureuri:false,
        fileElementId: 'imgFile',
        dataType : 'text',
        success: function(data,status){
            //显示图片
            alert(data);
            $("#fileName").val(data);
            $("#img_name").val(data);
            $("#uploadImage").attr("src","/upload_file/" + data);
            $("#uploadImage").show();
            $("#imgFile").hide()
        },
        error: function(data, status, e){
            alert(e);
        }
    });
    return false;
}

function GetImgValue(elem, sg, value){
    return $(elem).find("#fileName").val();
}

</script>	

<?php include './common/footer.php';?>