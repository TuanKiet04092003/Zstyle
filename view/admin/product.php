<?php
    $html_catalog='';
    foreach ($catalog as $item) {
        extract($item);
        $html_catalog.='<div class="dropdown-item" onclick="select(this)">'.$name.'</div>';
    }
    $html_product='';
    foreach ($product as $item) {
        extract($item);
        if($hot==1){
            $hot='x';
        }else{
            $hot='';
        }
        if($noibat==1){
            $noibat='x';
        }else{
            $noibat='';
        }
        if($bestsell==1){
            $bestsell='x';
        }else{
            $bestsell='';
        }
        if($trend==1){
            $trend='x';
        }else{
            $trend='';
        }
        $html_product.='<tr>
        <td>'.$ma_sanpham.'</td>
        <td>'.$name.'</td>
        <td>'.number_format($price,0,'.',',').'</td>
        <td>'.$noibat.'</td>
        <td>'.$bestsell.'</td>
        <td>'.$trend.'</td>
        <td>'.$view.'</td>
        <td>
            <a href="index.php?pg=updateproduct&id='.$id.'" class="edit">Sửa</a>
            <a href="index.php?pg=delproduct&id='.$id.'" class="del">Xóa</a>
        </td>
        </tr>';
        
    }

    $active='';
    $ma_sanpham='';
    $name='';
    $price='';
    $priceold='';
    $hot='';
    $noibat='';
    $chitiet='';
    $gioitinh='';
    $danhmuc='';
    $bestsell='';
    $trend='';
    $view='';
    if(isset($_SESSION['update_id']) && $_SESSION['update_id']){
      $active='active';
      if(isset($product_detail)){
        extract($product_detail);
        if($hot==1){
          $hot='Có';
        }else{
          $hot='Không';
        }
        if($noibat==1){
            $noibat='Có';
          }else{
            $noibat='Không';
          }
          if($bestsell==1){
            $bestsell='Có';
          }else{
            $bestsell='Không';
          }
          if($trend==1){
            $trend='Có';
          }else{
            $trend='Không';
          }
          if($gioitinh==1){
            $gioitinh='Nam';
          }else{
            if($gioitinh==2){
                $gioitinh='Nữ';
            }else{
                $gioitinh='Unisex';
            }
          }
          $danhmuc=$catalog_product['name'];
      }
    }
    
?>


<div class="dashboard-content" data-tab="3">
    
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
                    <form action="index.php?pg=addproduct" method="post">
                    <div class="modal-heading">Thêm sản phẩm mới</div>
                    <div class="modal-form modal-form-addpro">
                      <div class="modal-form-item">
                        <div class="modal-form-name">Mã sản phẩm*</div>
                        <input name="ma_sanpham" type="text" />
                      </div>
                      <div class="modal-form-item">
                        <div class="modal-form-name">Tên sản phẩm*</div>
                        <input name="name" type="text" />
                      </div>
                      <div class="modal-form-item">
                        <div class="modal-form-name">Giá hiện tại*</div>
                        <input name="price" type="text" />
                      </div>
                      <div class="modal-form-item">
                        <div class="modal-form-name">Giá cũ</div>
                        <input name="priceold" type="text" />
                      </div>
                      <div class="modal-form-item">
                        <div class="modal-form-name">Sản phẩm hot</div>

                        <div class="dropdown">
                          <div class="dropdown-select">
                              <div class="dropdown-content" dropdown="1">
                              Không
                              </div>
                              <input name="hot" type="hidden" class="dropdown-input" value="Không" dropdown="1"/>
                              <i
                                class="fa fa-angle-down dropdown-icon icon1"
                                aria-hidden="true" dropdown="1" onclick="dropdown(this)"></i>
                          </div>
                          <div class="dropdown-list active" dropdown="1">
                            <div class="dropdown-item" onclick="select(this)">Có</div>
                            <div class="dropdown-item" onclick="select(this)">Không</div>
                          </div>
                        </div>
                      </div> 
                      <div class="modal-form-item">
                        <div class="modal-form-name">Sản phẩm nổi bật</div>

                        <div class="dropdown">
                          <div class="dropdown-select">
                              <div class="dropdown-content" dropdown="2">
                              Không
                              </div>
                              <input name="noibat" type="hidden" class="dropdown-input" value="Không" dropdown="2"/>
                              <i
                                class="fa fa-angle-down dropdown-icon icon1"
                                aria-hidden="true" dropdown="2" onclick="dropdown(this)"></i>
                          </div>
                          <div class="dropdown-list active" dropdown="2">
                            <div class="dropdown-item" onclick="select(this)">Có</div>
                            <div class="dropdown-item" onclick="select(this)">Không</div>
                          </div>
                        </div>
                      </div>  
                      <div class="modal-form-item">
                        <div class="modal-form-name">Giới tính</div>

                        <div class="dropdown">
                          <div class="dropdown-select">
                              <div class="dropdown-content" dropdown="3">
                              Unisex
                              </div>
                              <input name="gioitinh" type="hidden" class="dropdown-input" value="Unisex" dropdown="3"/>
                              <i
                                class="fa fa-angle-down dropdown-icon icon1"
                                aria-hidden="true" dropdown="3" onclick="dropdown(this)"></i>
                          </div>
                          <div class="dropdown-list active" dropdown="3">
                            <div class="dropdown-item" onclick="select(this)">Unisex</div>
                            <div class="dropdown-item" onclick="select(this)">Nam</div>
                            <div class="dropdown-item" onclick="select(this)">Nữ</div>
                          </div>
                        </div>
                      </div>   
                      <div class="modal-form-item">
                        <div class="modal-form-name">Danh mục</div>

                        <div class="dropdown">
                          <div class="dropdown-select">
                              <div class="dropdown-content" dropdown="4">
                              <?=$catalog[0]['name']?>
                              </div>
                              <input name="idcatalog" type="hidden" class="dropdown-input" value="<?=$catalog[0]['name']?>" dropdown="4"/>
                              <i
                                class="fa fa-angle-down dropdown-icon icon1"
                                aria-hidden="true" dropdown="4" onclick="dropdown(this)"></i>
                          </div>
                          <div class="dropdown-list active" dropdown="4">
                            
                                <?=$html_catalog?>

                          </div>
                        </div>
                      </div>   
                      <div class="modal-form-item">
                        <div class="modal-form-name">Sản phẩm bán chạy</div>

                        <div class="dropdown">
                          <div class="dropdown-select">
                              <div class="dropdown-content" dropdown="5">
                              Không
                              </div>
                              <input name="bestsell" type="hidden" class="dropdown-input" value="Không" dropdown="5"/>
                              <i
                                class="fa fa-angle-down dropdown-icon icon1"
                                aria-hidden="true" dropdown="5" onclick="dropdown(this)"></i>
                          </div>
                          <div class="dropdown-list active" dropdown="5">
                            <div class="dropdown-item" onclick="select(this)">Có</div>
                            <div class="dropdown-item" onclick="select(this)">Không</div>
                          </div>
                        </div>
                      </div> 
                      <div class="modal-form-item">
                        <div class="modal-form-name">Sản phẩm xu hướng</div>

                        <div class="dropdown">
                          <div class="dropdown-select">
                              <div class="dropdown-content" dropdown="6">
                              Không
                              </div>
                              <input name="trend" type="hidden" class="dropdown-input" value="Không" dropdown="6"/>
                              <i
                                class="fa fa-angle-down dropdown-icon icon1"
                                aria-hidden="true" dropdown="6" onclick="dropdown(this)"></i>
                          </div>
                          <div class="dropdown-list active" dropdown="6">
                            <div class="dropdown-item" onclick="select(this)">Có</div>
                            <div class="dropdown-item" onclick="select(this)">Không</div>
                          </div>
                        </div>
                      </div>  
                      <div class="modal-form-item">
                        <div class="modal-form-name">Lượt xem*</div>
                        <input name="view" type="text" />
                      </div> 
                      <div class="modal-form-item">
                        <div class="modal-form-name">Chi tiết</div>
                        <input name="chitiet" type="text" />
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
                <h2 class="title-primary">Sản phẩm</h2>
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
                    <a href="index.php?pg=updateproduct&close=1">
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
                      <form action="index.php?pg=updateproduct" method="post">
                      <div class="modal-heading">Cập nhật danh mục</div>
                      <div class="modal-form  modal-form-addpro">
                      <div class="modal-form-item">
                        <div class="modal-form-name">Mã sản phẩm*</div>
                        <input name="ma_sanpham" type="text" value="<?=$ma_sanpham?>"/>
                      </div>
                      <div class="modal-form-item">
                        <div class="modal-form-name">Tên sản phẩm*</div>
                        <input name="name" type="text" value="<?=$name?>"/>
                      </div>
                      <div class="modal-form-item">
                        <div class="modal-form-name">Giá hiện tại*</div>
                        <input name="price" type="text" value="<?=$price?>"/>
                      </div>
                      <div class="modal-form-item">
                        <div class="modal-form-name">Giá cũ</div>
                        <input name="priceold" type="text" value="<?=$priceold?>"/>
                      </div>
                      <div class="modal-form-item">
                        <div class="modal-form-name">Sản phẩm hot</div>

                        <div class="dropdown">
                          <div class="dropdown-select">
                              <div class="dropdown-content" dropdown="7">
                              <?=$hot?>
                              </div>
                              <input name="hot" type="hidden" class="dropdown-input" value="<?=$hot?>" dropdown="7"/>
                              <i
                                class="fa fa-angle-down dropdown-icon icon1"
                                aria-hidden="true" dropdown="7" onclick="dropdown(this)"></i>
                          </div>
                          <div class="dropdown-list active" dropdown="7">
                            <div class="dropdown-item" onclick="select(this)">Có</div>
                            <div class="dropdown-item" onclick="select(this)">Không</div>
                          </div>
                        </div>
                      </div> 
                      <div class="modal-form-item">
                        <div class="modal-form-name">Sản phẩm nổi bật</div>

                        <div class="dropdown">
                          <div class="dropdown-select">
                              <div class="dropdown-content" dropdown="8">
                              <?=$noibat?>
                              </div>
                              <input name="noibat" type="hidden" class="dropdown-input" value="<?=$noibat?>" dropdown="8"/>
                              <i
                                class="fa fa-angle-down dropdown-icon icon1"
                                aria-hidden="true" dropdown="8" onclick="dropdown(this)"></i>
                          </div>
                          <div class="dropdown-list active" dropdown="8">
                            <div class="dropdown-item" onclick="select(this)">Có</div>
                            <div class="dropdown-item" onclick="select(this)">Không</div>
                          </div>
                        </div>
                      </div>  
                      <div class="modal-form-item">
                        <div class="modal-form-name">Giới tính</div>

                        <div class="dropdown">
                          <div class="dropdown-select">
                              <div class="dropdown-content" dropdown="9">
                              <?=$gioitinh?>
                              </div>
                              <input name="gioitinh" type="hidden" class="dropdown-input" value="<?=$gioitinh?>" dropdown="9"/>
                              <i
                                class="fa fa-angle-down dropdown-icon icon1"
                                aria-hidden="true" dropdown="9" onclick="dropdown(this)"></i>
                          </div>
                          <div class="dropdown-list active" dropdown="9">
                            <div class="dropdown-item" onclick="select(this)">Unisex</div>
                            <div class="dropdown-item" onclick="select(this)">Nam</div>
                            <div class="dropdown-item" onclick="select(this)">Nữ</div>
                          </div>
                        </div>
                      </div>   
                      <div class="modal-form-item">
                        <div class="modal-form-name">Danh mục</div>

                        <div class="dropdown">
                          <div class="dropdown-select">
                              <div class="dropdown-content" dropdown="10">
                              <?=$danhmuc?>
                              </div>
                              <input name="idcatalog" type="hidden" class="dropdown-input" value="<?=$danhmuc?>" dropdown="10"/>
                              <i
                                class="fa fa-angle-down dropdown-icon icon1"
                                aria-hidden="true" dropdown="10" onclick="dropdown(this)"></i>
                          </div>
                          <div class="dropdown-list active" dropdown="10">
                            
                                <?=$html_catalog?>

                          </div>
                        </div>
                      </div>   
                      <div class="modal-form-item">
                        <div class="modal-form-name">Sản phẩm bán chạy</div>

                        <div class="dropdown">
                          <div class="dropdown-select">
                              <div class="dropdown-content" dropdown="11">
                              <?=$bestsell?>
                              </div>
                              <input name="bestsell" type="hidden" class="dropdown-input" value="<?=$bestsell?>" dropdown="11"/>
                              <i
                                class="fa fa-angle-down dropdown-icon icon1"
                                aria-hidden="true" dropdown="11" onclick="dropdown(this)"></i>
                          </div>
                          <div class="dropdown-list active" dropdown="11">
                            <div class="dropdown-item" onclick="select(this)">Có</div>
                            <div class="dropdown-item" onclick="select(this)">Không</div>
                          </div>
                        </div>
                      </div> 
                      <div class="modal-form-item">
                        <div class="modal-form-name">Sản phẩm xu hướng</div>

                        <div class="dropdown">
                          <div class="dropdown-select">
                              <div class="dropdown-content" dropdown="12">
                              <?=$trend?>
                              </div>
                              <input name="trend" type="hidden" class="dropdown-input" value="<?=$trend?>" dropdown="12"/>
                              <i
                                class="fa fa-angle-down dropdown-icon icon1"
                                aria-hidden="true" dropdown="12" onclick="dropdown(this)"></i>
                          </div>
                          <div class="dropdown-list active" dropdown="12">
                            <div class="dropdown-item" onclick="select(this)">Có</div>
                            <div class="dropdown-item" onclick="select(this)">Không</div>
                          </div>
                        </div>
                      </div>  
                      <div class="modal-form-item">
                        <div class="modal-form-name">Lượt xem*</div>
                        <input name="view" type="text" value="<?=$view?>"/>
                      </div> 
                      <div class="modal-form-item">
                        <div class="modal-form-name">Chi tiết</div>
                        <input name="chitiet" type="text" <?=$chitiet?>/>
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
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Nổi bật</th>
                    <th>Bán chạy</th>
                    <th>Xu hướng</th>
                    <th>Lượt xem</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                    
                    <?=$html_product;?>

                </tbody>
              </table>
            </div>