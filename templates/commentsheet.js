var name = 'Philips';
var count = 55;
let commentsCards = '';

for(let i = 0; i < 2; i++)
  {
    commentsCards += `
      <div class="comment_card">
        <div class="left_comment_card">
          <div class="up member_avatar">
            <img src="../assets/img/loginBg/creative_1.jpg" alt="member_profile_picture">
          </div>
          <span class="dot"></span>
          <div class="down comment_timespan">
            <span>${i} hrs</span>
          </div>
        </div>
        <div class="right_comment_card">
          <div class="up member_txt_details">
            <div class="displayname">
            <span>joshua.abioye<span>
            </div>
            ${i !== 2 ? '<div class="subscribe_check">• Subscribed</div>' : ''}
          </div>
          <div class="down comment_body">
            <div class="content">
              <span class="txt_comment">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit debitis vero accusamus reprehenderit quos in corporis quod, labore non dolorem perspiciatis facilis expedita eaque odio sint vitae! Iusto, qui exercitationem.
              </span>
            </div>
            <div class="comment_options_tooltip_like">
              <div class="comment_option">
                <div class="comment_option_all_list">
                  <div class="comment_option_list">
                    <div class="coo_icon">

                      <!-- Title: “Ok Hand SVG Vector”
                      Author: “Sanity.io“— https://www.svgrepo.com/author/Sanity.io/
                      Source: “svgrepo.com“— https://www.svgrepo.com/
                      License: “MIT License”— https://www.svgrepo.com/page/licensing/#MIT
                      -->
                                    
                      <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                      <svg viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15.9957 11.5C14.8197 10.912 11.9957 9 10.4957 9C8.9957 9 5.17825 11.7674 6 13C7 14.5 9.15134 11.7256 10.4957 12C11.8401 12.2744 13 13.5 13 14.5C13 15.5 11.8401 16.939 10.4957 16.5C9.15134 16.061 8.58665 14.3415 7.4957 14C6.21272 13.5984 5.05843 14.6168 5.5 15.5C5.94157 16.3832 7.10688 17.6006 8.4957 19C9.74229 20.2561 11.9957 21.5 14.9957 20C17.9957 18.5 18.5 16.2498 18.5 13C18.5 11.5 13.7332 5.36875 11.9957 4.5C10.9957 4 10 5 10.9957 6.5C11.614 7.43149 13.5 9.27705 14 10.3751M15.5 8C15.5 8 15.3707 7.5 14.9957 6C14.4957 4 15.9957 3.5 16.4957 4.5C17.1281 5.76491 18.2872 10.9147 18.4957 13" />
                      </svg>
                    
                    </div>
                    <div class="to_tell_descrip">like</div>
                  </div>
                  <div class="comment_option_list">
                    <div class="coo_icon">
                      <!-- 
                        Title: “Ok Hand SVG Vector”
                        Author: “Sanity.io“— https://www.svgrepo.com/author/Sanity.io/
                        Source: “svgrepo.com“— https://www.svgrepo.com/
                        License: “MIT License”— https://www.svgrepo.com/page/licensing/#MIT
                      -->
                                    
                      <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.5 12L9.5 7M4.5 12L9.5 17M4.5 12L11 12M14.5 12C16.1667 12 19.5 13 19.5 17" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                    </div>
                    <div class="to_tell_descrip">reply</div>
                  </div>
                  <div class="comment_option_list">
                    <div class="coo_icon">
                      <!-- 
                        Title: “Saved SVG Vector”
                        Author: “Amir Baqian“— https://www.svgrepo.com/author/Amir%20Baqian/
                        Source: “svgrepo.com“— https://www.svgrepo.com/
                        License: “CC Attribution License”— https://www.svgrepo.com/page/licensing/#CC%20Attribution
                      -->

                      <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->

                      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19 19.2674V7.84496C19 5.64147 17.4253 3.74489 15.2391 3.31522C13.1006 2.89493 10.8994 2.89493 8.76089 3.31522C6.57467 3.74489 5 5.64147 5 7.84496V19.2674C5 20.6038 6.46752 21.4355 7.63416 20.7604L10.8211 18.9159C11.5492 18.4945 12.4508 18.4945 13.1789 18.9159L16.3658 20.7604C17.5325 21.4355 19 20.6038 19 19.2674Z" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                    </div>
                    <div class="to_tell_descrip">save</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    `
  }

export const commentsheet = 
`
  <ul>
    <!-- <b>Comments ${name}</b> -->
    <div class="commentbsheet up">
      <div class="comment_title_txt">
        <p>Comments <span>${count}</span></p>
      </div>
    </div>
    <div class="commentbsheet down">
      ${commentsCards}
    </div>
  </ul>
`;