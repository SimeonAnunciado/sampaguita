
      <script type="text/javascript">
      $(document).ready(function (){
        var validator = $('#form').bootstrapValidator({
            feedbackIcons : {
                    valid : "glyphicon glyphicon-ok",
                    invalid : "glyphicon glyphicon-remove",
                    validating : "glyphicon glyphicon-refresh",

                },

          fields : {
            fname : {
              validators :{
                notEmpty : {
                  message : "Required Firstname"
                },
                stringLength : {
                  min : 2,
                  max : 25,
                  message : "First name should be only 2-25 character "
                },
                regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'The full name can consist of alphabetical characters and spaces only'
                  },
              }
            },
            lname : {
              validators :{
                notEmpty : {
                  message : "Required Lastname"
                },
                stringLength : {
                  min : 2,
                  max : 25,
                  message : "Last name should be only 2-25 character "
                },
                regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'The full name can consist of alphabetical characters and spaces only'
                  },
              }
            },
            mname : {
              validators :{
                notEmpty : {
                  message : "Required Middlename"
                },
                stringLength : {
                  min : 2,
                  max : 25,
                  message : "Middle name should be only 2-25 character "
                },
                regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'The full name can consist of alphabetical characters and spaces only'
                  },
              }
            },
            gen : {
              validators :{
                notEmpty : {
                  message : "Required Gender"
                },
                stringLength : {
                  min : 4,
                  max : 6,
                  message : "Invalid Required Gender!"
                },
                regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'Invalid! Letters Only!'
                  },
              }
            },
            ph : {
              validators :{
                notEmpty : {
                  message : "Required Phone Number"
                },
                stringLength : {
                  min : 11,
                  max : 12,
                  message : "Invalid Number!"
                },
                integer:{
                  message:"Error It must be Number only!"
                }
              
              }
            },
             rel : {
              validators :{
                notEmpty : {
                  message : "Required Religion"
                },
                stringLength : {
                  min : 5,
                  max : 20,
                  message : "Invalid religion!"
                },
                 regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'Invalid! Letters Only!'
                  },
              }
            },
            add : {
              validators :{
                notEmpty : {
                  message : "Required Address"
                },
                stringLength : {
                  min : 5,
                  max : 50,
                  message : "Invalid Address!"
                },
                 regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'Invalid! Letters Only!'
                  },
              }
            },
            full : {
              validators :{
                notEmpty : {
                  message : "Required Name of Guardian"
                },
                stringLength : {
                  min : 5,
                  max : 20,
                  message : "Invalid Name!"
                },
                 regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'Invalid! Letters Only!'
                  },
              }
            },
             relation : {
              validators :{
                notEmpty : {
                  message : "Required Name of relation"
                },
                stringLength : {
                  min : 5,
                  max : 20,
                  message : "Invalid output!"
                },
                 regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'Invalid! Letters Only!'
                  },
              }
            },
             fathercontact: {
              validators :{
                notEmpty : {
                  message : "Required Guardian Contact Number"
                },
                stringLength : {
                  min : 12,
                  max : 12,
                  message : "Invalid Input!"
                },
                integer : {
                  message : "Invalid It should be contain Number only!"
                }
              }
            },
             mothercontact: {
              validators :{
                notEmpty : {
                  message : "Required Guardian Contact Number"
                },
                stringLength : {
                  min : 11,
                  max : 13,
                  message : "Invalid Input!"
                },
                integer : {
                  message : "Invalid It should be contain Number only!"
                }
              }
            },
              average: {
              validators :{
                notEmpty : {
                  message : "Required Average"
                },
                stringLength : {
                  min : 2,
                  max : 2,
                  message : "Invalid Input!"
                },
                integer : {
                  message : "Invalid It should be contain Number only!"
                }
              }
            },
            grade : {
              validators :{
                notEmpty : {
                  message : "Please Select Year!"
                },
              }
            }, 
             method : {
              validators :{
                notEmpty : {
                  message : "Please Select Method!"
                },
              }
            }  

          }
        });
      });
    </script>

    