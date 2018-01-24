  (function( $ ) {
    $.widget( "ui.combobox", {
      _create: function() {
        var input,
          that = this,
          wasOpen = false,
          select = this.element.hide(),
          selected = select.children( ":selected" ),
          value = selected.val() ? selected.text() : "",
          wrapper = this.wrapper = $( "<span>" )
            .addClass( "ui-combobox" )
            .insertAfter( select );
 
        function removeIfInvalid( element ) {
          var value = $( element ).val(),
            matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( value ) + "$", "i" ),
            valid = false;
          select.children( "option" ).each(function() {
            if ( $( this ).text().match( matcher ) ) {
              this.selected = valid = true;
              return false;
            }
          });
 
          if ( !valid ) {
            // remove invalid value, as it didn't match anything
        /*    $( element )
              .val( "" )
              .attr( "title", value + " didn't match any item" )
              .tooltip( "open" );*/
            select.val( "" );
            setTimeout(function() {
              input.tooltip( "close" ).attr( "title", "" );
            }, 2500 );
            input.data( "ui-autocomplete" ).term = "";
          }
        }
 
        input = $( "<input>" )
          .appendTo( wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "ui-state-default ui-combobox-input" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: function( request, response ) {
              var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
              response( select.children( "option" ).map(function() {
                var text = $( this ).text();
                if ( this.value && ( !request.term || matcher.test(text) ) )
                  return {
                    label: text.replace(
                      new RegExp(
                        "(?![^&;]+;)(?!<[^<>]*)(" +
                        $.ui.autocomplete.escapeRegex(request.term) +
                        ")(?![^<>]*>)(?![^&;]+;)", "gi"
                      ), "<strong>$1</strong>" ),
                    value: text,
                    option: this
                  };
              }) );
            },
            select: function( event, ui ) {
              ui.item.option.selected = true;
              that._trigger( "selected", event, {
                item: ui.item.option
              });
            },
            change: function( event, ui ) {
              if ( !ui.item ) {
            var idsel='#Tag'+$(this).parent().parent().children('select').attr('id').substring(6,7)+'Name';	
            $(idsel).val($(this).val());
            removeIfInvalid( this );
              }
            },
            messages: {
                noResults: '',
                results: function() {}
            }
          })
          .addClass( "ui-widget ui-widget-content ui-corner-left" );
 
        input.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
          return $( "<li>" )
            .append( "<a>" + item.label + "</a>" )
            .appendTo( ul );
        };
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Показать все" )
          .tooltip()
          .appendTo( wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "ui-corner-right ui-combobox-toggle" )
          .mousedown(function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .click(function() {
            input.focus();
 
            // close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
 
        input.tooltip({
          tooltipClass: "ui-state-highlight"
        });
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
  })( jQuery );
  var bbcode="";
 
  $(function() {
    $("#OpinionText").bbcode({tag_bold:true,tag_italic:true,tag_underline:true,tag_link:true,tag_image:true,button_image:true}); 
    $( "select" ).combobox();
    $( "#toggle" ).click(function() {
      $( "#combobox" ).toggle();
    });
    var istip;
    function GetVCard (subject){
        $("#vcard").hide();
    	$("#vcard").empty();
    	$("#StuffImg").empty();
    	var searchTerm=$("#StuffName").val();
    	var url="http://ru.wikipedia.org/w/api.php?action=parse&format=json&page=" + searchTerm+"&redirects=1&prop=text&callback=?";
    	var vcard='';
    	var author='';
    	var director=false;
    	$.getJSON(url,function(data){
    	 if (typeof data.parse != "undefined") 
    	{	 
    	  wikiHTML = data.parse.text["*"];
    	  $wikiDOM = $("<document>"+wikiHTML+"</document>");
    	  vcard=$wikiDOM.find('.infobox').html();
    	  $("#vcard").append(vcard);
    	  $("#vcard").show();
    	  $("#StuffImg").val($wikiDOM.find('.image').html());
    	  $("#StuffYear").val($wikiDOM.find('.dtstart').html());
    	  vtable=$("#vcard").find("tr");
    	  jQuery.each($("#vcard").find('tr'),function (){
    		  about=this.innerText.split('\n');
    		  if  (about.length > 1) {
    			//  alert ("Show about:"+about[1]);
    				 if (about[0].match(/^Режиссёр/))
    					 {
    					 $("#StuffAuthor").val(about[1].trim());
    					 director=true;
    					 }
    				 else if (about[0].match(/^Продюсер/))
    					 {
    					  if (!director)
    					  $("#StuffAuthor").val(about[1].trim());
    					 }
    				 
    		  }
    		  } );
    	 // $("#StuffName").val($wikiDOM.find('.summary').html());
    	}
    	}
      	);
    	  	
    };
    
    $("#StuffName").keyup(function (){
      	if (this.value.length >= 3) {
       	var searchTerm=$("#StuffName").val();
    	var url="http://ru.wikipedia.org/w/api.php?action=opensearch&search=" + searchTerm+"&format=json&callback=?";
    	$.getJSON(url,function(data)
    	{
   		if (typeof data[1] != "undefined")
		{
    	wikiList = data[1];
    	// $("#wikitip").offset(this.offset());
    	 $("#wikitip").empty();
    	 for (var i = 0; i < wikiList.length; ++i) {
    		  var element = wikiList[i];
    		  $("#wikitip").append("<li class=\"tipitem\">"+element+"</li>");
    		}
    	 istip=true;
    	 $(".tipitem").click (function (){
    	    	$("#StuffName").empty();
    	    	$("#StuffName").val(this.innerText);
    	    	$("#wikitip").fadeOut('slow');
    	    	istip=false;
    	    	GetVCard($("#StuffName").val());
    	    });
		  $("#wikitip").fadeIn('slow');
 		}
   		else istip=false;
    	});
    }
    });
    
    $("#StuffName").change(function () {
 //   	if (!istip)
    	GetVCard($("#StuffName").val());
    });
    
    $("#StuffName").blur(function () {
     	$("#wikitip").fadeOut('slow');
     	istip=false;
    });
    
    $("#StuffName").click(function () {
     	$("#wikitip").fadeOut('slow');
     	istip=false;
    });

  });
  