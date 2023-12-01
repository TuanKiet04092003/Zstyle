<?php
    $html_catalog='';
    foreach ($catalog as $item) {
        extract($item);
        if($sethome==0){
            $sethome='Không hiển thị';
        }else{
            $sethome='Hiển thị';
        }
        $html_catalog.='<tr>
        <td>'.$stt.'</td>
        <td>'.$name.'</td>
        <td>'.$sethome.'</td>
        <td>
            <a href="index.php?pg=updatecatalog&id='.$id.'" class="edit">Sửa</a>
            <a href="index.php?pg=delcatalog&id='.$id.'" class="del">Xóa</a>
        </td>
        </tr>
        ';
    }
    $active='';
    $name='';
    $stt='';
    $sethome='Hiển thị';
    if(isset($_SESSION['update_id']) && $_SESSION['update_id']){
      $active='active';
      if(isset($catalogdetail)){
        extract($catalogdetail);
        if($sethome==1){
          $sethome='Hiển thị';
        }else{
          $sethome='Không hiển thị';
        }
      }
    }
?>

<div class="dashboard-content" data-tab="2">
    
              <div class="modal modal-addpro">
                <div class="modal-overlay"></div>
                <div class="modal-content modal-addproduct">
                  <span class="modal-close">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </span>
                  <div class="modal-main">
                    <form action="index.php?pg=addcatalog" method="post">
                    <div class="modal-heading">Thêm danh mục mới</div>
                    <div class="modal-form modal-form-addpro">
                      <div class="modal-form-item">
                        <div class="modal-form-name">Stt hiển thị*</div>
                        <input name="stt" type="text" />
                      </div>
                      <div class="modal-form-item">
                        <div class="modal-form-name">Tên danh mục*</div>
                        <input name="name" type="text" />
                      </div>
                      <div class="modal-form-item">
                        <div class="modal-form-name">Hiển thị ở trang chủ</div>

                        <div class="dropdown">
                          <div class="dropdown-select">
                              <div class="dropdown-content" dropdown="1">
                              Hiển thị
                              </div>
                              <input name="sethome" type="hidden" class="dropdown-input" value="Hiển thị" dropdown="1"/>
                              <i
                                class="fa fa-angle-down dropdown-icon icon1"
                                aria-hidden="true" dropdown="1" onclick="dropdown(this)"></i>
                          </div>
                          <div class="dropdown-list active" dropdown="1">
                            <div class="dropdown-item" onclick="select(this)">Hiển thị</div>
                            <div class="dropdown-item" onclick="select(this)">Không hiển thị</div>
                          </div>
                        </div>
                      </div>  
                      </div>  
                    <div class="modal-btn">
                      <button name="btnsave" class="modal-button">Lưu</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>


              <div class="dashboard-heading">
                <h2 class="title-primary">Danh mục sản phẩm</h2>
                <button class="dashboard-add">
                  <i class="fa fa-plus" aria-hidden="true"></i>
                  Thêm
                </button>
                <div class="modal">
                  <div class="modal-overlay"></div>
                  <div class="modal-content">
                    <span class="modal-close">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </span>
                  </div>
                </div>
              </div>
              
                <div class="modal modal-update <?=$active?>">
                  <div class="modal-overlay"></div>
                  <div class="modal-content">
                    <a href="index.php?pg=updatecatalog&close=1">
                    <span class="modal-close">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </span>
                    </a>
                    <div class="modal-main">
                      <form action="index.php?pg=updatecatalog" method="post">
                      <div class="modal-heading">Cập nhật danh mục</div>
                      <div class="modal-form modal-form-addpro">
                      <div class="modal-form-item">
                        <div class="modal-form-name">Stt hiển thị*</div>
                        <input name="stt" type="text" value=<?=$stt?>>
                      </div>
                      <div class="modal-form-item">
                        <div class="modal-form-name">Tên danh mục*</div>
                        <input name="name" type="text"  value=<?=$name?>>
                      </div>
                      <div class="modal-form-item">
                        <div class="modal-form-name">Hiển thị ở trang chủ</div>

                        <div class="dropdown">
                          <div class="dropdown-select">
                              <div class="dropdown-content" dropdown="2">
                              <?=$sethome?>
                              </div>
                              <input name="sethome" type="hidden" class="dropdown-input" value="<?=$sethome?>" dropdown="2"/>
                              <i
                                class="fa fa-angle-down dropdown-icon icon1"
                                aria-hidden="true" dropdown="2" onclick="dropdown(this)"></i>
                          </div>
                          <div class="dropdown-list active" dropdown="2">
                            <div class="dropdown-item" onclick="select(this)">Hiển thị</div>
                            <div class="dropdown-item" onclick="select(this)">Không hiển thị</div>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div class="modal-btn">
                        <button name="btnupdate" class="modal-button">Lưu</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

                <table class="product">
                <thead>
                  <tr>
                    <th>Stt hiển thị</th>
                    <th>Tên danh mục</th>
                    <th>Hiển thị ở trang chủ</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                    
                    <?=$html_catalog;?>

                </tbody>
              </table>
            </div>