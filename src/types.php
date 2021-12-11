<?php

final class WPGraphQL_MetaBox_Types
{

    public static function register_builtin_types()
    {

        register_graphql_object_type('MBKeyValue', [
            'description'   => __('Meta Box Key Value type', 'wpgraphql-metabox'),
            'fields'        => [
                'key'   => [
                    'type' => 'String',
                    'description'   => __('Key', 'wpgraphql-metabox'),
                ],
                'value' => [
                    'type' => 'String',
                    'description'   => __('Value', 'wpgraphql-metabox'),
                ],
            ],
        ]);

        register_graphql_object_type('MBSingleImage', [
            'description'   => __('Meta Box single image type', 'wpgraphql-metabox'),
            'fields'        => [
                'name'          => [
                    'type'          => 'String',
                    'description'   => __('Single Image name', 'wpgraphql-metabox'),
                ],
                'path'          => [
                    'type'          => 'String',
                    'description'   => __('Single Image path', 'wpgraphql-metabox'),
                ],
                'url'           => [
                    'type'          => 'String',
                    'description'   => __('Single Image URL', 'wpgraphql-metabox'),
                ],
                'width'         => [
                    'type'          => 'Int',
                    'description'   => __('Single Image width', 'wpgraphql-metabox'),
                ],
                'height'        => [
                    'type'          => 'Int',
                    'description'   => __('Single Image height', 'wpgraphql-metabox'),
                ],
                'full_url'       => [
                    'type'          => 'String',
                    'description'   => __('Single Image full URL', 'wpgraphql-metabox'),
                ],
                'title'         => [
                    'type'          => 'String',
                    'description'   => __('Single Image title', 'wpgraphql-metabox'),
                ],
                'caption'       => [
                    'type'          => 'String',
                    'description'   => __('Single Image caption', 'wpgraphql-metabox'),
                ],
                'description'   => [
                    'type'          => 'String',
                    'description'   => __('Single Image description', 'wpgraphql-metabox'),
                ],
                'alt'           => [
                    'type'          => 'String',
                    'description'   => __('Single Image alt text', 'wpgraphql-metabox'),
                ],
                'srcset'        => [
                    'type'          => 'String',
                    'description'   => __('Single Image source set', 'wpgraphql-metabox'),
                ],
                'sizes'  => [
                    'type'        => [
                        'list_of' => 'MediaSize',
                    ],
                    'description' => __( 'The available sizes of the mediaItem', 'wp-graphql' ),
                    'resolve'     => function ( $media_details, $args, $context, $info ) {
                        if ( ! empty( $media_details['sizes'] ) ) {
                            foreach ( $media_details['sizes'] as $size_name => $size ) {
                                $size['ID']   = $media_details['ID'];
                                $size['name'] = $size_name;
                                $sizes[]      = $size;
                            }
                        }

                        return ! empty( $sizes ) ? $sizes : null;
                    },
                ],
            ],
        ]);

        register_graphql_object_type('MBSingleFile', [
            'description'   => __('Meta Box single file type', 'wpgraphql-metabox'),
            'fields'        => [
                'id'          => [
                    'type'          => 'Int',
                    'description'   => __('Single File name', 'wpgraphql-metabox'),
                    'resolve'     => function ( $file, $args, $context, $info ) {
                        return $file['ID'];
                    },
                ],
                'name'          => [
                    'type'          => 'String',
                    'description'   => __('Single File name', 'wpgraphql-metabox'),
                ],
                'path'          => [
                    'type'          => 'String',
                    'description'   => __('Single File path', 'wpgraphql-metabox'),
                ],
                'url'           => [
                    'type'          => 'String',
                    'description'   => __('Single File URL', 'wpgraphql-metabox'),
                ],
                'title'         => [
                    'type'          => 'String',
                    'description'   => __('Single File title', 'wpgraphql-metabox'),
                ],
            ],
        ]);
    }
}
