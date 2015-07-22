function passwordStrengthCheck(password1, password2, passwordsInfo)
{
  //Must contain 5 characters or more
  var WeakPass = /(?=.{6,}).*/;
  //Must contain lower case letters and at least one digit.
  var MediumPass = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/;
  //Must contain at least one upper case letter, one lower case letter and one digit.
  var StrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/;
  //Must contain at least one upper case letter, one lower case letter and one digit.
  var VryStrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{5,}$/;

  $(password1).on('keyup', function(e) {
    if(VryStrongPass.test(password1.val()))
    {
      passwordsInfo.removeClass().addClass('vrystrongpass').html("Password rất mạnh!)");
    }
    else if(StrongPass.test(password1.val()))
    {
      passwordsInfo.removeClass().addClass('strongpass').html("Password mạnh!");
    }
    else if(MediumPass.test(password1.val()))
    {
      passwordsInfo.removeClass().addClass('goodpass').html("Mật khẩu tốt");
    }
    else if(WeakPass.test(password1.val()))
    {
      passwordsInfo.removeClass().addClass('stillweakpass').html("Mật khẩu còn yếu");
    }
    else
    {
      passwordsInfo.removeClass().addClass('weakpass').html("Mật khẩu rất yếu");
    }
  });

  $(password2).on('keyup', function(e) {

    if(password1.val() !== password2.val())
    {
      passwordsInfo.removeClass().addClass('weakpass').html("Mật khẩu không giống");
    }else{
      passwordsInfo.removeClass().addClass('goodpass').html("Mật khẩu giống nhau");
    }

  });
}
