<?php
                              function randomCode($digit = 4) {
                                                            $random = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTU";
                                                            $data = "";
                                                            for ($i = 0; $i < $digit; $i++)
                                                                                          $data .= $random[rand(0, strlen($random) - 1)];
                                                            return $data;
                              }

?>
