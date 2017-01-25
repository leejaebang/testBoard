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
		<table id="jqGrid030"></table>
		<div id="jqGridPager030"></div>
	</div>
</div> 

<script type="text/javascript" src="./js/ajaxFileUpload.js"></script>
<script type="text/javascript">
var lastsel;
$(document).ready(function () {
    $("#jqGrid030").jqGrid({
        url: 'getGridData2.php',
        mtype: 'GET',
		// we set the changes to be made at client side using predefined word clientArray
        datatype: 'json',
        page: 1,
        colModel: [
            {
				label: "번호",
                name: 'no',
                index: 'no',
                // key: true인 경우 name과 index를 'id'로 해주거나, 아래처럼 keys: true를 해줘야 한다.
				keys: true,
				align:'center', 
                width: 40
// 				editable:true,
// 				editoptions:{readonly:true},
//             	editrules:{edithidden:true}
            },
            {
				label: '제목',
                name: 'title',
                index: 'title',
                width: 200,
                editable: true, // must set editable to true if you want to make the field editable
                editrules: {required: true}
            },
            {
				label: '주소',
                name: 'lp_url',
                index: 'lp_url',
                width: 400,
                editable: true,
                editrules: {required: true},
                formatter: custom_link,
                unformat:customUnFormat,
                edittype:'custom', 
                editoptions:{custom_element: myelem, custom_value: myvalue}
            },
            {
				label: '이미지',
                name: 'img_name',
                index: 'img_name',
//                hidden: true,
				formatter:alarmFormatter,
				unformat:imageUnFormat,
                editable:true,
                edittype:'custom', 
                editoptions:{custom_element: ImgUpload, custom_value: GetImgValue}
            },
            {
            	label: '조회수',
            	name: 'hits',
            	index: 'hits',
            	align:'right',
            	width: 65
            },
            {
            	label: '작성일',
            	name: 'write_date',
            	index: 'write_date',
            	align:'center',
            	width: 100
            },
            {
            	label: '상세보기',
            	name: 'view',
            	index: 'view',
            	align:'center',
            	width: 50,
            	formatter: view_link
            }
        ],
		viewrecords: true,
		autowidth: true,
		height: '100%',
		rowNum: 10, // 한페이지에 보여줄 데이터 개수 -- -1은 전체데이터 불러오기
		rowList:[10,30,50,100],	// 페이징 옵션(한페이지당 몇개의 데이터를 출력할 것인지 select박스로 정의)
		//rownumbers: true, // 레코드별 자동으로 번호를 붙이는 컬럼 생성 여부
	   	//rownumWidth: 40,
	   	sordorder: 'desc',
	  	//loadonce: true,	// search 기능이 된다, 한번 불러오는 걸로 끝
	  	loadonce: false,  // paging기능이 된다, 지속적인 리로딩
	  	onSelectRow: editRow,
	   	//sortname: 'unic_url',
// 	  	onSelectRow: function(id){
// 	        if(id && id!==lastsel){
// 	          jQuery('#jqGrid030').restoreRow(lastsel);
// 	          jQuery('#jqGrid030').editRow(id,true);
// 	          lastsel=id;
// 	        }
// 	    },
	    editurl: 'editData2.php',
        pager: "#jqGridPager030"
    });

    var lastSelection;

    function editRow(no) {
        if (no && no !== lastSelection) {
            var grid = $("#jqGrid030");
            grid.jqGrid('restoreRow',lastSelection); // 한칸씩 수정할 수 있도록 함
            grid.jqGrid('editRow',no, {keys: true} );
            lastSelection = no;// 한칸씩 수정할 수 있도록 함
        }
    }

    jQuery("#jqGrid030").setGridParam({datatype:'json', page:1, url:'getGridData2.php'}).trigger('reloadGrid');
    //jQuery("#jqGridPager030").setGridParam({page:"page", rows: "rows", sord:"desc" , url:'editData2.php'}).trigger('reloadGrid');
    
    $('#jqGrid030').navGrid('#jqGridPager030',
            // the buttons to appear on the toolbar of the grid
            { edit: true, add: true, del: true, search: false, refresh: false, view: false, position: "left", cloneToTop: false },
            // options for the Edit Dialog
            {
                height: 'auto',
                width: 620,
                //prmNames:  {page:"page", rows: "rows", sord:"desc" }, 
                editCaption: "The Edit Dialog",
                recreateForm: true,
                closeAfterEdit: true,
                //afterSubmit: function () { location.reload(true); },
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
                afterSubmit: function () {  location.reload(true); },
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





//일반링크 버튼 - jqgrid에서 해당 value값(DOCU_URL) 받아 클릭시 해당 url로 이동
function custom_link(cellvalue){
	return "<a href='"+cellvalue+"' target='_blank'>"+cellvalue+"</a>";
}
function customUnFormat( cellvalue, options, cell){  
    return $('a', cell).attr('href');  
} 

function myelem (value, options) {
	  var el = document.createElement("input");
	  el.type="text";
	  el.value = value.replace(/(<([^>]+)>)/gi, "");
	  return el;
	}
	 
function myvalue(elem, operation, value) {
    if(operation === 'get') {
       return $(elem).val();
    } else if(operation === 'set') {
       $('input',elem).val(value);
    }
}

//로그 버튼 - jqgrid에서 해당 value값(JOB_ID) 받아 클릭시 get_page_log(id값)호출 
function view_link(cellvalue, options, rowObject){
	var url = "<button class='btn .btn-warning' style='margin-top: 0px; margin-bottom: 0px;' onClick="+"get_page_log('"+cellvalue+"')"+">Info</button>";
	return url;
}

// Modal로그 - 아이디값 넘겨 modal창에 데이터 불러오기
function get_page_log(value){
	var url = "http://imfluence.net/copysource/keywordTextConvert_google.php?no="+value;
	return window.open(url,'_blank');
}

// formatter:alarmFormatter => 파일 뷰 및 다운
function alarmFormatter(cellvalue, options, rowdata){
	 return '<a href="./upload_file/'+cellvalue+'" target="_blank"><img src="./upload_file/'+ cellvalue +'" style="width:50x;height:50px" /></a>';
}
function imageUnFormat( cellvalue, options, cell){  
    return $('img', cell).attr('src');  
} 
// editoptions:{ custom_element: ImgUpload  => 파일 업로드 입력필드를 지정하고 el.onchange = UploadFile;를 통해 아래의 UploadFile()를 호출한다.
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

/* 앞에서 먼저 "./js/ajaxFileUpload.js" 파일을 불러와야 아래 $.ajaxFileUpload가 실행된다.
     그리고 ./fileupload.php에서 파일 업로드 경로 및 파일이름을 설정한다.
*/
function UploadFile() {
    $.ajaxFileUpload({
        url : './fileupload.php',
        type : 'POST',
        secureuri:false,
        fileElementId: 'imgFile',
        dataType : 'text',
        success: function(data,status){
            //alert(data);
            $("#fileName").val(data);
            $("#img_name").val(data);
            $("#uploadImage").attr("src","./upload_file/" + data);
            $("#uploadImage").show();
            $("#imgFile").hide()
        },
        error: function(data, status, e){
            alert(e);
        }
    });
    return false;
}

// editoptions:{ custom_value: GetImgValue 파일명 리턴
function GetImgValue(elem, sg, value){
    return $(elem).find("#fileName").val();
}

</script>

<?php include './common/footer.php';?>