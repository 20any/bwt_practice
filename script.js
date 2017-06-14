// ����� �������� ���-��������
$(function() {
 
  // ��� ������� �� ������ ��������
  $("#reload-captcha").click(function() {
	// ������� ����� ��� �����
    $('#img-captcha').attr('src','/feedback/captcha.php?id='+Math.random()+'');
  });
 
  // ��� �������� ����� contactForm �� ������ (id="contactForm")
  $('#contactForm').submit(function(event) {
    // �������� ����������� �������� ��������
    event.preventDefault();
    // ������� ����������, ������� ����� �������� � ��� ������� ����� ��� ���
    var formValid = true;
    // ���������� ��� �������� ���������� ����� (input � textarea) 
    $('#contactForm input,textarea').each(function() {
      // ���������, �������� �� ������ ������� ������
      // ���� ��� ���, �� �� ��������� ��� ��������
      if ($(this).attr('id') == 'text-captcha') { return true; }
      // ������� �������, ������� ����� .form-group (��� ������������ success/error)
      var formGroup = $(this).parents('.form-group');
      // ������� glyphicon (������ ������ ��� ������)
      var glyphicon = formGroup.find('.form-control-feedback');
      // ��������� ��������� ������ � ������� HTML5 ������� checkValidity
      if (this.checkValidity()) {
        // ��������� � formGroup ����� .has-success � ������� .has-error
        formGroup.addClass('has-success').removeClass('has-error');
        // ��������� � glyphicon ����� .glyphicon-ok � ������� .glyphicon-remove
        glyphicon.addClass('glyphicon-ok').removeClass('glyphicon-remove');
      } else {
        // ��������� � formGroup ����� .has-error � ������� .has-success
     	formGroup.addClass('has-error').removeClass('has-success');
	    // ��������� � glyphicon ����� glyphicon-remove � ������� glyphicon-ok
	    glyphicon.addClass('glyphicon-remove').removeClass('glyphicon-ok');
	    // ���� ������� �� ������ ��������, �� �������� ����� ��� �� �������� 
	    formValid = false;  
      }
    });
    // ��������� �������, ���������� ��� �����
    // �������� �������� �������� input, ������� �������� ��� �����
    var captcha = $("#text-captcha").val();
    // ���� ���������� �������� � ���� ����� �� ����� 6,
  	// �� �������� ����� ��� �� �������� � �� ���������� ����� �� ������
    if (captcha.length!=6) {
	  // �������� �������, ���������� �����
      inputCaptcha = $("#text-captcha");
	  // ������� ������, �������� ����� .form-group (��� ������������ success/error)
      formGroupCaptcha = inputCaptcha.parents('.form-group');
	  // ������� glyphicon (������ ������ ��� ������)
      glyphiconCaptcha = formGroupCaptcha.find('.form-control-feedback');
	  // ��������� � formGroup ����� .has-error � ������� .has-success
      formGroupCaptcha.addClass('has-error').removeClass('has-success');
	  // ��������� � glyphicon ����� glyphicon-remove � ������� glyphicon-ok
      glyphiconCaptcha.addClass('glyphicon-remove').removeClass('glyphicon-ok');
    }
    // ���� ����� ������� � ����� ����� ����� 6 ��������, �� ���������� ����� �� ������ (AJAX)
    if (formValid && captcha.length==6) {
	  //�������� ���, ������� ��� ������������	
	  var name = $("#name").val();
	  //�������� email, ������� ��� ������������
      var email = $("#email").val();
	  //�������� ���������, ������� ��� ������������
      var message = $("#message").val();
	  //�������� �����, ������� ��� ������������
      var captcha = $("#text-captcha").val();
 
      // ������, ����������� �������� ����� ���������� ����� ����� ��������� � �� ������
      var formData = new FormData();
      // �������� � formData �������� 'name'=��������_����_name
      formData.append('name', name);
      // �������� � formData �������� 'email'=��������_����_email
      formData.append('email', email);
      // �������� � formData �������� 'message'=��������_����_message
      formData.append('message', message);
      // �������� � formData �������� 'captcha'=��������_����_captcha
      formData.append('captcha', captcha);
 
	  //���������� ������ �� ������ (AJAX)
      $.ajax({
		//����� �������� ������� - POST
        type: "POST",
		//URL-����� ������� 
        url: "/feedback/process.php",
        //������������ ������ - formData
        data: formData,
        // �� ������������� ��� ��������, �.�. ������������ FormData
        contentType: false,
        // �� ������������ ������ formData
        processData: false,
        // ��������� ����������� ����������� � ��������
        cache: false,
	    	//��� �������� ���������� �������
        success : function(data){
 
          // ��������� ������ JSON, ���������� �� �������
          var $data =  JSON.parse(data);
          // ������������� ��������, ����������� ����� ������, ������ ������
          $('#error').text('');
 
          // ���� ������ ������ ����� success (������ ��������)
          if ($data.result == "success") {
 
			// �������� ����� �������� �����
            $('#contactForm').hide();
			// ������� � ��������, �������� id=successMessage, ����� hidden
            $('#successMessage').removeClass('hidden');
          }
          else if ($data.result == "invalidCaptcha") {
            // ���� ������ ������ ����� invalidcaptcha, �� ������ ���������...
            // �������� �������, ���������� �����
            inputCaptcha = $("#text-captcha");
            // ������� ������, �������� ����� .form-group (��� ������������ success/error)
            formGroupCaptcha = inputCaptcha.parents('.form-group');
            // ������� glyphicon (������ ������ ��� ������)
            glyphiconCaptcha = formGroupCaptcha.find('.form-control-feedback');
            // ��������� � formGroup ����� .has-error � ������� .has-success
            formGroupCaptcha.addClass('has-error').removeClass('has-success');
            // ��������� � glyphicon ����� glyphicon-remove � ������� glyphicon-ok
            glyphiconCaptcha.addClass('glyphicon-remove').removeClass('glyphicon-ok');
            // ������� ����� ��� �����
            $('#img-captcha').attr('src', '/feedback/captcha.php?id=' + Math.random() + '');
            // ������������� ����, � ������� �������� ������������ ���� ����� ������ ��������
            $("#text-captcha").val('');
          } else {
            // ���� ������ ������ ����� error, �� ������ ���������...
            $('#error').text('��������� ������ ��� �������� ����� �� ������.');
          }
        },
        error: function (request) {
          $('#error').text('��������� ������ ' + request.responseText + ' ��� �������� ������.');
        }        
      });
	}	 
  });
});