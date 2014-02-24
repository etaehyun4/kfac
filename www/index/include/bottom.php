
<table width="920" height="80" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="230"><img src="/index/images/bottom_01.gif" width="230" height="80" /></td>
        <td width="400"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/index/images/bottom_02.gif" width="400" height="10" /></td>
          </tr>
          <tr>
            <td><a href="/index/solution/sol_01.php"><img src="/index/images/bottom_04.gif" width="86" height="20" border="0" /></a><a href="/index/solution/sol_02.php"><img src="/index/images/bottom_05.gif" width="37" height="20" border="0" /></a><a href="/index/solution/sol_03.php"><img src="/index/images/bottom_06.gif" width="58" height="20" border="0" /></a><a href="/index/solution/sol_04.php"><img src="/index/images/bottom_07.gif" width="77" height="20" border="0" /></a><a href="/index/solution/sol_05.php"><img src="/index/images/bottom_08.gif" width="37" height="20" border="0" /></a><a href="/index/index.php"><img src="/index/images/bottom_09.gif" width="47" height="20" border="0" /></a><a href="/index/sitemap.php"><img src="/index/images/bottom_10.gif" width="58" height="20" border="0" /></a></td>
          </tr>
          <tr>
            <td><img src="/index/images/bottom_11.gif" width="400" height="50" /></td>
          </tr>
        </table></td>
        <td width="290"><img src="/index/images/bottom_03.gif" width="290" height="80" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<div id=divMenu style="position:absolute; left:932px; top:302px; width: 88px; height: 221px;">
  <table width="88" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="88" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="68" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="/index/images/quick_09.gif" width="68" height="8" /></td>
            </tr>
            <tr>
              <td width="68"><table width="68" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="3" bgcolor="16AEBB">&nbsp;</td>
                  <td width="62"><table width="61" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="61"><img src="/index/images/quick_13.gif" width="61" height="54" /></td>
                    </tr>
                    <tr>
                      <td><a href="/index/company/company.php"><img src="/index/images/quick_18.gif" width="61" height="26" border="0" /></a></td>
                    </tr>
                    <tr>
                      <td><a href="/index/product/pro_02_01.php"><img src="/index/images/quick_20.gif" width="61" height="20" border="0" /></a></td>
                    </tr>
                    <tr>
                      <td><a href="/index/solution/sol_01.php"><img src="/index/images/quick_22.gif" width="61" height="20" border="0" /></a></td>
                    </tr>
                    <tr>
                      <td><a href="/index/service/service_01.php"><img src="/index/images/quick_24.gif" width="61" height="19" border="0" /></a></td>
                    </tr>
                    <tr>
                      <td><a href="/index/bbs/write.php?bo_table=comm_01"><img src="/index/images/quick_26.gif" width="61" height="18" border="0" /></a></td>
                    </tr>
                  </table></td>
                  <td width="5" bgcolor="16AEBB"></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td><img src="/index/images/quick_27.gif" width="68" height="8" /></td>
            </tr>
          </table></td>
          <td width="20" valign="top"><img src="/index/images/quick_10.gif" width="20" height="101" /></td>
        </tr>
      </table></td>
    </tr>
  </table>
</div>
<!-- 스크롤 배너 스크립트 시작 -->
<script language="javascript">
<!--
var bNetscape4plus = (navigator.appName == "Netscape" && navigator.appVersion.substring(0,1) >= "4");
var bExplorer4plus = (navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.substring(0,1) >= "4");
function CheckUIElements(){
      var yMenuFrom, yMenuTo, yButtonFrom, yButtonTo, yOffset, timeoutNextCheck;

      if ( bNetscape4plus ) { 
              yMenuFrom   = document["divMenu"].top;
              yMenuTo     = top.pageYOffset + 320; //넷스케이프용 최초 레이어 좌표 값
      }
      else if ( bExplorer4plus ) {
              yMenuFrom   = parseInt (divMenu.style.top, 10);
              yMenuTo     = document.body.scrollTop + 320; //익스플로러용 최초 레이어 좌표 값
      }

      timeoutNextCheck = 500;

      if ( Math.abs (yButtonFrom - (yMenuTo + 152)) < 6 && yButtonTo < yButtonFrom ) {
              setTimeout ("CheckUIElements()", timeoutNextCheck);
              return;
      }

      if ( yButtonFrom != yButtonTo ) {
              yOffset = Math.ceil( Math.abs( yButtonTo - yButtonFrom ) / 10 );
              if ( yButtonTo < yButtonFrom )
                      yOffset = -yOffset;

              if ( bNetscape4plus )
                      document["divLinkButton"].top += yOffset;
              else if ( bExplorer4plus )
                      divLinkButton.style.top = parseInt (divLinkButton.style.top, 10) + yOffset;

              timeoutNextCheck = 10;
      }
      if ( yMenuFrom != yMenuTo ) {
              yOffset = Math.ceil( Math.abs( yMenuTo - yMenuFrom ) / 20 );
              if ( yMenuTo < yMenuFrom )
                      yOffset = -yOffset;

              if ( bNetscape4plus )
                      document["divMenu"].top += yOffset;
              else if ( bExplorer4plus )
                      divMenu.style.top = parseInt (divMenu.style.top, 10) + yOffset;

              timeoutNextCheck = 10;
      }

      setTimeout ("CheckUIElements()", timeoutNextCheck);
}

function OnLoad()
{
      var y;
      if ( top.frames.length )
      if ( bNetscape4plus ) {
              document["divMenu"].top = top.pageYOffset + 320; //넷스케이프용 로딩시 시작 레이어 좌표 값
              document["divMenu"].visibility = "visible";
      }
      else if ( bExplorer4plus ) {
              divMenu.style.top = document.body.scrollTop + 320;
      }
      CheckUIElements();
      return true;
}
OnLoad();
//-->
</script>
