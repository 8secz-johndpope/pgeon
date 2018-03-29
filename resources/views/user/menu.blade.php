
         <div class="col-md-4" style="margin-top:10px">
                    <div class="list-group m-b-md">
                        <a href="/profile" class="list-group-item {{$current_menu == 'profile'?'active':''}}">
          Profile</a>
          @if (!Auth::user()->provider)
                        <a href="/security" class="list-group-item {{$current_menu == 'security'?'active':''}}">
          Security</a>
          @endif
                      
                         <a href="/membership" class="list-group-item {{$current_menu == 'membership'?'active':''}}">
          Membership</a> 
                        <a href="/preferences" class="list-group-item {{$current_menu == 'preferences'?'active':''}}">
          Preferences</a>
                    </div>
                </div>
