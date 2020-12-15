<div id="chat-box-body">
    <div id="chat-circle" class="waves-effect waves-circle btn btn-circle btn-lg btn-warning l-h-70">
        <div id="chat-overlay"></div>
        <span class="icon-Group-chat font-size-30"><span class="path1"></span><span class="path2"></span></span>
    </div>

    <div class="chat-box">
        <div class="chat-box-header p-15 d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <button class="waves-effect waves-circle btn btn-circle btn-primary-light h-40 w-40 rounded-circle l-h-45" type="button" data-toggle="dropdown">
                  <span class="icon-Add-user font-size-22"><span class="path1"></span><span class="path2"></span></span>
              </button>
              <div class="dropdown-menu min-w-200">
                <a class="dropdown-item font-size-16" href="#">
                    <span class="icon-Color mr-15"></span>
                    New Group</a>
                <a class="dropdown-item font-size-16" href="#">
                    <span class="icon-Clipboard mr-15"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                    Contacts</a>
                <a class="dropdown-item font-size-16" href="#">
                    <span class="icon-Group mr-15"><span class="path1"></span><span class="path2"></span></span>
                    Groups</a>
                <a class="dropdown-item font-size-16" href="#">
                    <span class="icon-Active-call mr-15"><span class="path1"></span><span class="path2"></span></span>
                    Calls</a>
                <a class="dropdown-item font-size-16" href="#">
                    <span class="icon-Settings1 mr-15"><span class="path1"></span><span class="path2"></span></span>
                    Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item font-size-16" href="#">
                    <span class="icon-Question-circle mr-15"><span class="path1"></span><span class="path2"></span></span>
                    Help</a>
                <a class="dropdown-item font-size-16" href="#">
                    <span class="icon-Notifications mr-15"><span class="path1"></span><span class="path2"></span></span> 
                    Privacy</a>
              </div>
            </div>
            <div class="text-center flex-grow-1">
                <div class="text-dark font-size-18">Mayra Sibley</div>
                <div>
                    <span class="badge badge-sm badge-dot badge-primary"></span>
                    <span class="text-muted font-size-12">Active</span>
                </div>
            </div>
            <div class="chat-box-toggle">
                <button id="chat-box-toggle" class="waves-effect waves-circle btn btn-circle btn-danger-light h-40 w-40 rounded-circle l-h-45" type="button">
                  <span class="icon-Close font-size-22"><span class="path1"></span><span class="path2"></span></span>
                </button>                    
            </div>
        </div>
        <div class="chat-box-body">
            <div class="chat-box-overlay">   
            </div>
            <div class="chat-logs">
                <div class="chat-msg user">
                    <div class="d-flex align-items-center">
                        <span class="msg-avatar">
                            <img src="../images/avatar/2.jpg" class="avatar avatar-lg">
                        </span>
                        <div class="mx-10">
                            <a href="#" class="text-dark hover-primary font-weight-bold">Mayra Sibley</a>
                            <p class="text-muted font-size-12 mb-0">2 Hours</p>
                        </div>
                    </div>
                    <div class="cm-msg-text">
                        Hi there, I'm Jesse and you?
                    </div>
                </div>
                <div class="chat-msg self">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="mx-10">
                            <a href="#" class="text-dark hover-primary font-weight-bold">You</a>
                            <p class="text-muted font-size-12 mb-0">3 minutes</p>
                        </div>
                        <span class="msg-avatar">
                            <img src="../images/avatar/3.jpg" class="avatar avatar-lg">
                        </span>
                    </div>
                    <div class="cm-msg-text">
                       My name is Anne Clarc.         
                    </div>        
                </div>
                <div class="chat-msg user">
                    <div class="d-flex align-items-center">
                        <span class="msg-avatar">
                            <img src="../images/avatar/2.jpg" class="avatar avatar-lg">
                        </span>
                        <div class="mx-10">
                            <a href="#" class="text-dark hover-primary font-weight-bold">Mayra Sibley</a>
                            <p class="text-muted font-size-12 mb-0">40 seconds</p>
                        </div>
                    </div>
                    <div class="cm-msg-text">
                        Nice to meet you Anne.<br>How can i help you?
                    </div>
                </div>
            </div><!--chat-log -->
        </div>
        <div class="chat-input">      
            <form>
                <input type="text" id="chat-input" placeholder="Send a message..."/>
                <button type="submit" class="chat-submit" id="chat-submit">
                    <span class="icon-Send font-size-22"></span>
                </button>
            </form>      
        </div>
    </div>
</div>