<?php foreach ($paginatedCategories as $index => $category): ?>
                                    <tr>
                                        <td class="align-middle"><?=  $index + 1; ?></td>
                                        <td class="align-middle"><?=  $category['name']; ?></td>
                                        <td class="align-middle">
                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit category">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <a href="javascript:;" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete category">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?= $pager->makeLinks($page,$perPage, $total, 'custom_view') ?>