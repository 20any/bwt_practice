<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>����� �����������</title>
  <link rel="stylesheet" href="/feedback/css/bootstrap.min.css">
</head>
<body>
<h2>�����������</h2>
<form class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-xs-3" for="lastName">�������:</label>
    <div class="col-xs-9">
      <input type="text" class="form-control" id="lastName" placeholder="������� �������">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="firstName">���:</label>
    <div class="col-xs-9">
      <input type="text" class="form-control" id="firstName" placeholder="������� ���">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="fatherName">��������:</label>
    <div class="col-xs-9">
      <input type="text" class="form-control" id="fatherName" placeholder="������� ��������">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3">���� ��������:</label>
    <div class="col-xs-3">
      <select class="form-control">
        <option>����</option>
      </select>
    </div>
    <div class="col-xs-3">
      <select class="form-control">
        <option>�����</option>
      </select>
    </div>
    <div class="col-xs-3">
      <select class="form-control">
        <option>���</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="inputEmail">Email:</label>
    <div class="col-xs-9">
      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="inputPassword">������:</label>
    <div class="col-xs-9">
      <input type="password" class="form-control" id="inputPassword" placeholder="������� ������">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="confirmPassword">����������� ������:</label>
    <div class="col-xs-9">
      <input type="password" class="form-control" id="confirmPassword" placeholder="������� ������ ��� ���">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="phoneNumber">�������:</label>
    <div class="col-xs-9">
      <input type="tel" class="form-control" id="phoneNumber" placeholder="������� ����� ��������">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="postalAddress">�����:</label>
    <div class="col-xs-9">
      <textarea rows="3" class="form-control" id="postalAddress" placeholder="������� �����"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3">���:</label>
    <div class="col-xs-2">
      <label class="radio-inline">
        <input type="radio" name="genderRadios" value="male"> �������
      </label>
    </div>
    <div class="col-xs-2">
      <label class="radio-inline">
        <input type="radio" name="genderRadios" value="female"> �������
      </label>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-offset-3 col-xs-9">
      <label class="checkbox-inline">
        <input type="checkbox" value="agree">  � �������� � <a href="#">���������</a>.
      </label>
    </div>
  </div>
  <br />
  <div class="form-group">
    <div class="col-xs-offset-3 col-xs-9">
      <input type="submit" class="btn btn-primary" value="�����������">
      <input type="reset" class="btn btn-default" value="�������� �����">
    </div>
  </div>
</form>